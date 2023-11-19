<?php
  $stepPrices = [
   1728 => 50,
   1786 => 50,
   2074 => 100,
   2612 => 100,
   2919 => 100,
   3015 => null
  ]; 

  function calculateBill(int $units) {
    global $stepPrices;
    $totalPrice = 0;
    foreach($stepPrices as $price => $step) {
      if(is_null($step)) $step = $units;
      if($units < $step){
        $totalPrice += $units * $price;
        break;
      }
      $totalPrice += $step * $price;
      $units = $units - $step;
    }
    return $totalPrice;
  } 
  print_r(calculateBill(120));
?>