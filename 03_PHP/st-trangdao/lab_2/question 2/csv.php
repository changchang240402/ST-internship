<?php
$file = fopen("../be-intern-2023-labs/03_PHP/st-trangdao/lab_2/question 2/csv", "r") or die("Unable to open file!");
echo '<table border="1">';
echo '<tr><th>ID</th><th>Name</th><th>Age</th></tr>';

while (!feof($file)) {
    $line = fgets($file);
    $data = explode(',', $line);
    if (count($data) == 3) {
        $id = trim($data[0]);
        $name = trim($data[1]);
        $age = trim($data[2]);
        echo "<tr><td>$id</td><td>$name</td><td>$age</td></tr>";
    }
}
echo '</table>';
fclose($file);