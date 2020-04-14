<?php

$ctx = stream_context_create(array('http'=>
    array(
        'timeout' => 3
    )
));

$url = $_GET['url'];
//not showing waring messages on website
error_reporting(E_ALL ^ E_WARNING); 
try {
    
    include(__DIR__ . '/vendor/autoload.php');
    $cms = new \DetectCMS\DetectCMS($url);
    if($cms->getResult()) {
      echo $cms->getResult();
    } else {
          echo "CMS couldn't be detected";
    } 
  } catch (Exception $e){
      echo 'Unavailable';
  }