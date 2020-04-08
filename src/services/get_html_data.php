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

  echo($google_analytics);
  echo($reCAPTCHA);

} catch (Exception $e){
    echo 'Unavailable';
}
