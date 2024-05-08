<?php
require_once 'database.php';
class location_operation {

    public $city= 'Cairo';
    public $country = "Egypt";
    public $prayerTimes = ["Fajr" => "", "Dhuhr" => "", "Sunrise" => "", "Asr" => "", "Maghrib" => "", "Isha" => "", "Imsak" => ""];
    public function set_location($apiKey)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = "161.35.73.18";

            // create curl resource
            $ipAPI = curl_init();
    
            // set url
            curl_setopt($ipAPI, CURLOPT_URL, 
            "https://api.ipgeolocation.io/ipgeo?apiKey={$apiKey}&ip=".$ip);
    
            //return the transfer as a string
            curl_setopt($ipAPI, CURLOPT_RETURNTRANSFER, 1);
            
            // $output contains the output string
            $output = curl_exec($ipAPI);
            curl_close($ipAPI);
            
            $ipdata = json_decode($output, true);

            $city = $ipdata['city'];
            $country = $ipdata['country_name'];

            $this->city     = $city;
            $this->country  = $country;
    }

    public function set_prayer_times($country, $city)
    {
        $prayerTimes = curl_init();

        $current_year = date('Y');
        $current_month = date('m');
        $current_day = date('d');
        curl_setopt($prayerTimes, CURLOPT_URL, 
        "http://api.aladhan.com/v1/calendarByCity/{$current_year}/{$current_month}?city={$city}&country={$country}&method=2");
        
                //return the transfer as a string
        curl_setopt($prayerTimes, CURLOPT_RETURNTRANSFER, 1);

        curl_close($prayerTimes);

        $targetDate = $current_day . '-' . $current_month . '-' . $current_year;
        $times = curl_exec($prayerTimes);
        $prayer_times = json_decode($times, true);
        $this->prayerTimes['Fajr'] = $prayer_times['data'][0]["timings"]["Fajr"];
        $this->prayerTimes['Dhuhr'] = $prayer_times['data'][0]["timings"]["Dhuhr"];
        $this->prayerTimes['Asr'] = $prayer_times['data'][0]["timings"]["Asr"];
        $this->prayerTimes['Maghrib'] = $prayer_times['data'][0]["timings"]["Maghrib"];
        $this->prayerTimes['Isha'] = $prayer_times['data'][0]["timings"]["Isha"];
        $this->prayerTimes['Sunrise'] = $prayer_times['data'][0]["timings"]["Sunrise"];
        $this->prayerTimes['Imsak'] = $prayer_times['data'][0]["timings"]["Imsak"];;

    }

    public function get_qibla()
    {
        $html = '<iframe src=https://qiblafinder.withgoogle.com/intl/en/desktop/finder width = "50%" height = "560px"></iframe>';
        return $html;
    }

    

    public function get_mosques($city, $country)
    {
        $database = new Database;
        $database->__construct();

        $query = "SELECT * FROM mosques WHERE city = ? AND country = ?";
        $result = $database->executeQuery($query, array($city, $country));
        if ($result->num_rows == 0) {
            echo "<br>No mosques found for City: $city, Country: $country<br>";
        }else{
        while ($row = $result->fetch_assoc()) {
            // Process each row as needed
            echo "Mosque Name: " . $row['mosque'] . ", City: " . $row['city'] . ", Country: " . $row['country'] . "<br>";
        }
        }   
        // Free the result set
        $result->free();
        
        // Close the database connection
        $database->closeConnection();
    }

    public function get_restaunts($city, $country)
    {
        $database = new Database;
        $database->__construct();

        $query = "SELECT * FROM restraunts WHERE city = ? AND country = ?";
        $result = $database->executeQuery($query, array($city, $country));
        if ($result->num_rows == 0) {
            echo "<br>No restaurants found for City: $city, Country: $country<br>";
        }else{
        while ($row = $result->fetch_assoc()) {
            // Process each row as needed
            echo "Restraunt Name: " . $row['restraunt'] . ", City: " . $row['city'] . ", Country: " . $row['country'] . "<br>";
        }
        }
        
        // Free the result set
        $result->free();
        
        // Close the database connection
        $database->closeConnection();
    }

}

    $location = new location_operation;
    $location->set_location($apiKey = "49df93b663474864a8bd2bf4f0f3a86d");
    $location->set_prayer_times($location->country, $location->city);
    $data = $location->get_qibla();
    echo $data;
    $location->get_mosques($location->city, $location->country);
    $location->get_restaunts($location->city, $location->country);
    // $location->get_mosques("City 1", "Country 1");
    // $location->get_restaunts("City 1", "Country 1");
    var_dump($location);
?>