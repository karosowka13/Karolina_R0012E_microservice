<?php
ini_set("include_path", '/home/stu3jpq032/php:' . ini_get("include_path") );
require_once "Net/GeoIP.php";

//$geoip = Net_GeoIP::getInstance("/path/to/geoipdb.dat");


$ctx = stream_context_create(array('http'=>
    array(
        'timeout' => 3
    )
));

$url = $_GET['url'];

try {
    $geoip = lookupCountryName(gethostbyname($url));
    echo($geoip);
} catch (Exception $e){
    echo 'Unavailable';
}


