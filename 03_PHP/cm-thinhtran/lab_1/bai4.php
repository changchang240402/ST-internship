<?php
  function deleteSpecifyItem($list, $delete_item){
    $new_list = array();
    foreach($list as $value){
      if($value !== $delete_item){
        array_push($new_list, $value);
      }
    }
    return $new_list;
  }

  // Updated Solution
  function deleteSpecifyItem2($array, $delete_item)
  {
      foreach ($array as $key => $value) {
          if ($value === $delete_item) {
              unset($array[$key]);
          }
      }
      return $array;
  }

  $list = array('jan', 'feb', 'march', 'april','april', 'may');
  $delete_item = 'april';
  print_r(deleteSpecifyItem2($list, $delete_item));
?>