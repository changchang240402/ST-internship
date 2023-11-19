<?php
$csvFileName = 'exercise.csv';
// Đọc dữ liệu từ tệp CSV
if (($handle = fopen($csvFileName, 'r'))) {
    echo '<table border="1">';

    while (($data = fgetcsv($handle))) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($data[0]) . '</td>';
        echo '<td>' . htmlspecialchars($data[1]) . '</td>';
        echo '<td>' . htmlspecialchars($data[2]) . '</td>';
        echo '</tr>';
    }

    echo '</table>';

    fclose($handle);
} else {
    echo 'Không thể mở tệp CSV.';
}
