<?php
//https://api.ipgeolocation.io/ipgeo?apiKey=API_KEY&ip=2001:4860:4860::1

    $ip = $_SERVER['REMOTE_ADDR'];
    $ip = "161.35.73.18";
    $current_year = date('Y');

    // Get the current month
    $current_month = date('m');
    $current_day = date('d');
        // create curl resource
        $ipAPI = curl_init();

        // set url
        curl_setopt($ipAPI, CURLOPT_URL, 
        "https://api.ipgeolocation.io/ipgeo?apiKey=49df93b663474864a8bd2bf4f0f3a86d&ip=".$ip);

        //return the transfer as a string
        curl_setopt($ipAPI, CURLOPT_RETURNTRANSFER, 1);
        
        // $output contains the output string
        $output = curl_exec($ipAPI);
        curl_close($ipAPI); 

        $prayerTimes = curl_init();
        $ipdata = json_decode($output, true);

        $city = $ipdata['city'];
        $country = $ipdata['country_name'];
        curl_setopt($prayerTimes, CURLOPT_URL, 
        "http://api.aladhan.com/v1/calendarByCity/{$current_year}/{$current_month}?city={$city}&country={$country}&method=2");
        
                //return the transfer as a string
        curl_setopt($prayerTimes, CURLOPT_RETURNTRANSFER, 1);

        $times = curl_exec($prayerTimes);
        $prayer_times = json_decode($times, true);
        print_r($prayer_times);

?>