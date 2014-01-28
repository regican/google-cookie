<?php 
class GoogleCookie {
	
	private $utmz;
	
	public function __construct(){
		$this->utmz = array(
			'raw' => isset($_COOKIE['__utmz']) ? $_COOKIE['__utmz'] : '',
			
			//parsed values
			'source' 		=> '',
			'medium'		=> '',
			'term'			=> '',
			'content'		=> '',
			'campaign'		=> '',
			'gclid'			=> '',
			'stamp'			=> '',
			'domainId'		=> '',
			'sessionId'		=> '',
			'campaignId'	=> '',
		);
		
		$this->_parseCookie();
	}
	
	private function _parseCookie(){
		if (!empty($this->utmz['raw'])){
			$utm = explode('|',$this->utmz['raw']);
			
			//parse IDs and timestamp
			list(
				$this->utmz['domainId'],
				$this->utmz['stamp'],
				$this->utmz['sessionId'],
				$this->utmz['campaignId'],
				$utm[0]
			) = preg_split("/(?>\.)/i", $utm[0], 5);
			
			//make the timestamp human readible
			$this->utmz['stamp'] = date('Y-m-d H:i:s',$this->utmz['stamp']);
			
			
			foreach($utm as $u){
				list($key,$val) = explode('=', rawurldecode($u) );
				
				switch($key){
					case 'utmcsr':
						$this->utmz['source'] = $val;
					break;
					case 'utmcmd':
						$this->utmz['medium'] = $val;
					break;
					case 'utmctr':
						$this->utmz['term'] = $val;
					break;
					case 'utmcct':
						$this->utmz['content'] = $val;
					break;
					case 'utmccn':
						$this->utmz['campaign'] = $val;
					break;
					case 'utmgclid':
						$this->utmz['gclid'] = $val;
					break;
					default:
				}
				
			}
		}
	}
	
	public function getCookie(){
		return $this->utmz;
	}

}