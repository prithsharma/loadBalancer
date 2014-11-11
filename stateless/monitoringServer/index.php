<?php
function isSiteAvailable($server, $query)
{
	$url = $server.$query;
	//echo $url;
	//check, if a valid url is provided
        if(!filter_var($url, FILTER_VALIDATE_URL))
        {
                return 'URL provided wasn\'t valid';
        }

        //make the connection with curl
        $cl = curl_init($url);
        curl_setopt($cl,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($cl,CURLOPT_HEADER,false);
        //curl_setopt($cl,CURLOPT_NOBODY,true);
        curl_setopt($cl,CURLOPT_RETURNTRANSFER,true);

        //get response
        $response = curl_exec($cl);

        curl_close($cl);
	//echo $response;
        if ($response) return $response;

	return false;
}
$mainServer = "http://192.168.2.7/";
$secondaryServer = "http://192.168.2.8/";
//print_r($_SERVER);

$response = isSiteAvailable($mainServer, $_SERVER['QUERY_STRING']);
if($response)
	echo $response;
else
{
	$response = isSiteAvailable($secondaryServer, $_SERVER['QUERY_STRING']);
	if($response)
		echo $response;
	else
		echo "Looks like both servers are down";
}	
?>
