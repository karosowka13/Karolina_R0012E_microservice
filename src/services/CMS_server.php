<?php

$ctx = stream_context_create(array('http'=>
    array(
        'timeout' => 3
    )
));

$url = $_GET['url'];

try {
    
  include(__DIR__ . "detectCMS.php");
  $cms = new \DetectCMS\DetectCMS($url);
  $cms->getResult();
      echo ($cms->getResult());
} catch (Exception $e){
    echo 'Unavailable';
}
