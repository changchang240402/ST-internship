<?php
function processData(int|float|string|array $data, string $filter = null): int
{
    if (is_int($data)) {
        return $data;
    }
    if (is_float($data)) {
        return round($data);
    }
    if (is_string($data)) {
        return strlen($data);
    }
    if (is_array($data)) {
        if ($filter) {
            $filteredArray = array_filter($data, fn ($element) => str_contains($element, $filter));
            return count($filteredArray);
        } else {
            return count($data);
        }
    }
    return 0;
}

echo processData(7.2);
echo processData(55);
echo processData('code');
echo processData(['a', 'b', 'c', 'a'], 'a');
