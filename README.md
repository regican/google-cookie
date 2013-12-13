##UTMZ Google Cookie Parser
parses google analytics cookie into a useable variable

###Usage

	include 'google_cookie.php';
	
	$utm = new GoogleCookie();
	$cookieValue = $utm->getCookie();


###Sample Output

    [raw] => 195498537.1386954969.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)
    [source] => (direct)
    [medium] => (none)
    [term] => 
    [content] => 
    [campaign] => (direct)
    [gclid] => 
    [stamp] => 2013-12-13 18:16:09
    [domainId] => 195498537
    [sessionId] => 1
    [campaignId] => 1

