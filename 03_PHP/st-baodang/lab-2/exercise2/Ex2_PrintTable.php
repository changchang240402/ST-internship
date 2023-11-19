<?php
// Tạo một bảng (table) với format HTML dựa trên file info.csv
function printTable()
{
    $filePath = __DIR__ . "/info.csv";
    if (filesize($filePath) === 0) {
        return "File is empty";
    }

    // Read data and convert it to array
    $resource = fopen($filePath, 'r');
    $str = fread($resource, filesize($filePath));

    $lines = array_map(function ($line) {
        if (strlen(trim($line)) > 0) {
            return explode(",", $line);
        }
    }, explode("\n", $str));

    $lines = array_filter($lines, function($value) {
        return !empty($value);
    });
    // Create table from the array
    $result = "<table>";
    $result .= "<tr>";
    foreach ($lines[0] as $col) {
        $result .= "<th>" . trim($col) . "</th>";
    }
    $result .= "</tr>";
    foreach (array_slice($lines, 1) as $line) {
        $result .= "<tr>";
        foreach ($line as $value) {
            $result .= "<td>" . trim($value) . "</td>";
        }
        $result .= "</tr>";
    }
    $result .= "</table>";

    return $result;
}

echo printTable();
