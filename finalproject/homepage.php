<?php
include 'navigation.php';
date_default_timezone_set('America/New_York');
echo "The time is " . date("h:i");
echo "</br>";
$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
$yql_query = 'select wind from weather.forecast where woeid in (select woeid from geo.places(1) where text="chicago, il")';
$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
// Make call with cURL
$session = curl_init("https://query.yahooapis.com/v1/public/yql?q=select%20item.condition%20from%20weather.forecast%20where%20woeid%20%3D%2012770926&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys");
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
// Convert JSON to PHP object
echo $json;
$phpObj = json_decode($json);

?>