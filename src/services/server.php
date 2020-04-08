<?php

$ctx = stream_context_create(array('http'=>
    array(
        'timeout' => 3
    )
));

$url = $_GET['url'];

try {

  $tmp = (file_get_contents('https://api.builtwith.com/free1/api.json?KEY=7faa40e1-2852-4b2e-b856-3a67dbd1a1f0&LOOKUP='.$url, false, $ctx));
  echo($tmp);
} catch (Exception $e){
    echo 'Unavailable';
}