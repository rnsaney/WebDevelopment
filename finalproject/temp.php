<?php
    class Temp {
        
        static $athens = 12770926;
        static $newYork = 2459115;
        static $miami = 2450022;
        
        //Yahoo Temp API
        public static function getTemp($woeid)
        {
            $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
            $yql_query = 'select wind from weather.forecast where woeid in (select woeid from geo.places(1) where text="chicago, il")';
            $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
            // Make call with cURL
            $session = curl_init("https://query.yahooapis.com/v1/public/yql?q=select%20item.condition%20from%20weather.forecast%20where%20woeid%20%3D%20".$woeid."&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys");
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object
            //echo $json;
            $response = json_decode($json);
            return $response->query->results->channel->item->condition->temp;
        }
    }
?>