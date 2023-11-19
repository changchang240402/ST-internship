<?php
$csvFile = fopen('introduceFile.csv', 'r');
if ($csvFile === false) {
    die("Không thể mở file CSV");
}
echo '<table border="1">';
while (($data = fgetcsv($csvFile)) !== false) {
    echo '<tr>';
    foreach ($data as $column) {
        echo "<td>$column</td>";
    }
    echo '</tr>';
}
echo '</table>';
fclose($csvFile);
