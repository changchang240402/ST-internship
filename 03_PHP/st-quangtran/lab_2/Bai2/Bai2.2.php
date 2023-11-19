<?php
$fileName = 'data.csv';
$file = fopen($fileName, 'r');
if ($file) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>";
    while (($data = fgetcsv($file, 1000, ","))) {
        echo "<tr>" . "\n";
        foreach ($data as $value) {
            echo "<td>" . $value . "</td>" . "\n";
        }
        echo "</tr>" . "\n";
    }

    echo "</table>";
    fclose($file);
} else {
    echo "Không thể mở file $fileName.";
}
