<?php
fwrite(fopen("myprofile.txt", "w"), implode(PHP_EOL , [
    "Phan Văn Quốc Tuấn",
    "Classmethod Inc 's Backend Intern"
]));

$csvFile = 'cau2.csv';
if (file_exists($csvFile) && is_readable($csvFile)) {
    $file = fopen($csvFile, 'r');
    if ($file) {
        echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>";
        while (($data = fgetcsv($file)) !== false) {
            echo "<tr>";
            echo "<td>{$data[0]}</td>";
            echo "<td>{$data[1]}</td>";
            echo "<td>{$data[2]}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không mở được file csv";
    }
    fclose($file);
}

