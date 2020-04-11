<?php
require 'google_analytics.php';
require 'reCAPTCHA.php';

$url = $_GET['url'];

try {
  $file = file_get_contents($url);
  $html = new DOMDocument();
  @$html->loadHTML($file);

  $get_google_analytics = new get_google_analytics;
  $get_reCAPTCHA = new get_reCAPTCHA;

  $google_analytics = $get_google_analytics->get_google_analytics();
  $reCAPTCHA = $get_reCAPTCHA->get_reCAPTCHA();

  $html_data =[];
  array_push($html_data, $google_analytics);
  array_push($html_data, $reCAPTCHA);
  echo json_encode($html_data);
  
} catch (Exception $e){
    echo 'Unavailable';
}
