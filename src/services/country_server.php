<?php
//ini_set(“log_errors”, TRUE);
//$log_file = "./my-errors.log"; 
//ini_set(‘error_log’, $log_file);
ini_set("include_path", '/home/stu3jpq032/php:' . ini_get("include_path") );
require_once "Net/GeoIP.php";

$geoip = Net_GeoIP::getInstance("/home/stu3jpq032/php/data/Net_GeoIP/data/GeoIP.dat");


$ctx = stream_context_create(array('http'=>
    array(
        'timeout' => 3
    )
));

$url = $_GET['url'];

try {
    $ip = gethostbyname($url); //getting ip because of database requirement
    echo $geoip->lookupCountryName($ip);
    if (empty($ip)) {'Data unavalible';}
} catch (Exception $e){
    echo 'Unavailable';
}


