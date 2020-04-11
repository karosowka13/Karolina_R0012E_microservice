<?php

$ctx = stream_context_create(array('http'=>
    array(
        'timeout' => 3
    )
));

$url = $_GET['url'];

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