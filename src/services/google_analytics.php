<?php

class get_google_analytics{
  public function get_google_analytics() {
    global $html;
    global $url;
    $answer =[];
    $head = [];

    $scripts = $html->getElementsByTagName('head');
    foreach($scripts as $script){
      array_push($head, $html->saveHTML($script));
    }

    foreach($head as $head_part) {
      if((strpos($head_part, ('analytics.js'))) || strpos($head_part, ('google-analytics.com')) !== false){
        array_push($answer,'YES');
      } 
    };
    if(in_array('YES', $answer)) {
      $answer = 'YES';
    } elseif(($handle = fopen('google_analytics_data.csv', 'r')) !== FALSE) {
        //crreat array from csv column
        $websites = array();
        while (($website = fgetcsv($handle)) !== FALSE) {
          $websites[] = $website[0];
          }
          fclose($handle);
          //print_r($websites);
          foreach($websites as $www){
            if(strpos($url, $www) !== false){
               array_push($answer, 'YES'); 
            }
          }
          if(in_array('YES', $answer)){
            $answer = 'YES';
          } else {
            $answer = 'NO';
          }
        }
    return $answer;
  }
}
