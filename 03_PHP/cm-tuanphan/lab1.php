<?php
// PHP using recursive function
function recursive($n)
{
    if ($n <= 1) {
        return $n;
    } else {
        return recursive($n - 1) + recursive($n - 2);
    }
}
echo recursive(5);

// Fix the Spacing
function correctSpacing($sentence)
{
    return trim(preg_replace('/\s+/', ' ', $sentence));
}

echo correctSpacing("The film   starts       at      midnight. ");
echo correctSpacing("The     waves were crashing  on the     shore.   ");
echo correctSpacing(" Always look on    the bright   side of  life.");

// Return the First Element in an Array?
function getFirstValue($array)
{
    return $array[0] ?? [];
}

// Remove specific element by value from array
$lits = array('jan', 'feb', 'march', 'april', 'may');
$delete_item = 'april';
print_r(array_diff($lits, [$delete_item]));

// Repeating letter 
function doubleChar($str)
{
  $str_arr = str_split($str);
  foreach ($str_arr as &$iter) {
    $iter .= $iter;
  }
  unset($iter);
  return implode($str_arr);
}
echo doubleChar("String");

// How to check if an Array is a subnet of another Array?
function isSubnetArr($array, $another_array)
{
    $result = array_intersect($array, $another_array);
    return count($result) < count($array);
}
$array = array('jan', 'feb', 'march', 'april', 'may');
$another_array = array('jan', 'may');
echo isSubnetArr($array, $another_array);

// Sử dụng FOR and DO WHILE in ra giá trị chẵn của 1 khoảng giá trị min max cho trước
function minMaxEvens($min_value, $max_value)
{
    for ($i = $min_value; $i <= $max_value; $i++) {
        if ($i % 2 == 0) {
            echo $i . "\n";
        }
    }
}
minMaxEvens(10, 30);


// Sử dụng SWITCH CASE để in ra số ngày trong tháng 
function daysInMonth($month, $year)
{
    switch ($month) {
        case 2:
            if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
                return 29;
            } else {
                return 28;
            }
        case 4:
        case 6:
        case 9:
        case 11:
            return 30; 
        default:
            return 31; 
    }
}
function dateCountInMonth($month, $year)
{
    $days = daysInMonth($month, $year);
    echo "Tháng $month năm $year có $days ngày.";
}

dateCountInMonth(2, 2024);



// Sử dụng IF ELSE để check 1 biến khác null 
function checkNULL($error)
{
    echo empty($error) ? "This variable is null" : "This variable is not null";
}
checkNULL(null);

function calculate_bill(int $units)
{
    $total_cost = 0;
    if ($units <= 50) {
        $total_cost = $units * 1728;
    } elseif ($units <= 100) {
        $total_cost = 50 * 1728 + ($units - 50) * 1786;
    } elseif ($units <= 200) {
        $total_cost = 50 * 1728 + 50 * 1786 + ($units - 100) * 2074;
    } elseif ($units <= 300) {
        $total_cost = 50 * 1728 + 50 * 1786 + 100 * 2074 + ($units - 200) * 2612;
    } elseif ($units <= 400) {
        $total_cost = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + ($units - 300) * 2919;
    } else {
        $total_cost = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + 100 * 2919 + ($units - 400) * 3015;
    }

    return $total_cost;
}

function calculate_bill_2(int $n)
{
    $factors = [
        [50, 1728],
        [50, 1786],
        [100, 2074],
        [100, 2612],
        [100, 2919],
    ];

    $total = 0;

    foreach ($factors as $factor) {
        $level = $factor[0];
        $rate = $factor[1];

        if ($n > 0) {
            $current_calc = min($n, $level);
            $total += $current_calc * $rate;
            $n -= $current_calc;
        } else {
            break;
        }
    }
    return $total;
}
?>