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
      if(strpos($head_part, ('google-analytics.com')) !== false){
        array_push($answer,'YES');
      } 
    };
    if(in_array('YES', $answer)) {
      $answer = 'YES';
    } elseif(($handle = fopen('google_analytics_data.csv', 'r')) !== FALSE) {
        $column_data = array();
        $row = -1;
        while (($data = fgetcsv($handle, ',' )) !== FALSE) {
          $num = count($data);
          $row++;
          for ($c = 0; $c < $num; $c++) {
            $column_data[$row][$c]= $data[$c];
        }
            foreach($column_data as $www){
              if(strpos($url, $www) !== false){
                array_push($answer, 'YES');
                
              }
            }
          }
          fclose($handle);
        } 
      else {
      $answer = 'NO';
    }
    return $answer;
  }
}
