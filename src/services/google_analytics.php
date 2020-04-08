<?php

class get_google_analytics{
  public function get_google_analytics() {
    global $html;
    $answer =[];
    $head = [];

    $scripts = $html->getElementsByTagName('head');
    foreach($scripts as $script){
      array_push($head, $html->saveHTML($script));
    }

    foreach($head as $head_part) {
      if(strpos($head_part, ('google-analytics.com')) !== false){
        array_push($answer,'YES');
      }
    }

    if(in_array('YES', $answer))  {
      $answer = 'YES';
    } else {
      $answer = 'NO';
    }

    return $answer;

  }

}
