<?php
$min = 10;
$max = 50;
function useForLoop($min, $max) {
    $result = '';
    for($i=$min;$i<=$max;$i++){
        if($i%2==0){
            $result.= $i.' ';
        }
    }
    return $result;
}
echo useForLoop($min, $max);
echo "\n";

function useDoWhileLoop($min, $max) {
    $result = '';
    $i = $min;
    do{
        if($i%2==0){
            $result.= $i.' ';
        }
        $i++;
    }while($i<=$max);
    return $result;
}
echo useDoWhileLoop($min, $max);
echo "\n";

function getDayOfMonth($month, $year) {
    switch ($month) {
        case 1: 
        case 3: 
        case 5: 
        case 7: 
        case 8: 
        case 10: 
        case 12: 
            $days = 31;
            break;
        case 4: 
        case 6: 
        case 9: 
        case 11: 
            $days = 30;
            break;
        case 2: 
            $days = 28; 
            if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
                $days = 29; 
            }
            break;
        default:
            $days = 0;
    }
    
    if ($days > 0) {
        echo "Month $month year $year have $days days. \n";
    } else {
        echo "Month not found.\n";
    }
}
$month = 2; 
$year = 2016; 
getDayOfMonth($month, $year);


function checkVariableNull($myVar) {
    if (is_null($myVar)) {
        echo "Variable is null.\n";
    } else {
        echo "Variable is not null.\n";
    }
}
$myVar = "Hello";
checkVariableNull($myVar);
