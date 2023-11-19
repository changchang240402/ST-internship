<?php

function convertCsvToHtmlTable($csvFilePath)
{
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Age</th>';
    echo '</tr>';

    if (($handle = fopen($csvFilePath, 'r')) !== false) {
        while (($data = fgetcsv($handle)) !== false) {
            echo '<tr>';
            foreach ($data as $value) {
                echo '<td>' . htmlspecialchars($value) . '</td>';
            }
            echo '</tr>';
        }
        fclose($handle);
    } else {
        echo 'Unable to open CSV file.';
    }

    echo '</table>';
}
$csvFile = 'data.csv';
convertCsvToHtmlTable($csvFile);
