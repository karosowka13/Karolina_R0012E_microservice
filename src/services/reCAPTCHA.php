<?php
class get_reCAPTCHA {
  public function get_reCAPTCHA(){
    global $html;
    $answer = [];

    $scripts = $html->getElementsByTagName('script');

    foreach($scripts as $script) {
      if(strpos($script->getAttribute('src'), 'recaptcha/api.js') !== false ) {
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