<?php
//solution 1
function removeSpecific($array, $deleteItem) {
    while($indexDelete = array_search($deleteItem, $array)) {
        unset($array[$indexDelete]);
    }
    return $array;
}
print_r(removeSpecific(['jan', 'feb', 'march', 'april', 'april', 'may'], 'april'));
//solution 2
function removeSpecific2($array, $deleteItem) {
    return array_diff($array,[$deleteItem]);
}
print_r(removeSpecific2(['jan', 'feb', 'march', 'march', 'april', 'may'], 'march'));
