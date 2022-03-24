<?php

if(!function_exists('getTimezone')){
    function getTimezone($location)
    {
        $location = urlencode($location);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.ipgeolocation.io/timezone?apiKey=a778967e4e2d4356bfcf515bb95614d5&location='.$location,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        if($response){
            $response = json_decode($response,true);
            return $response['date_time'];
        }else{
            return "";
        }
    }
}
