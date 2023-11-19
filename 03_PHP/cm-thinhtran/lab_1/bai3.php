<?php
  function getFirstValue($array) {
    if(sizeof($array) > 0)
      return $array[0];
    return "Array is empty";
  }

  $array = array(1,2,3,4);
  print_r(getFirstValue($array));
?>