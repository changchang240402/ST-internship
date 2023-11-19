<?php
  function doubleChar($str) {
    $new_str = "";
    for ($i = 0; $i < strlen($str); $i++) {
      $new_str = $new_str.str_repeat($str[$i],2);
    }
    return $new_str;
  }
  $str = "String";    
  $str1 = "Hello World!";
  $str2 = "1234!_ ";
  print_r(doubleChar($str2));
?>