<?php
// Solution 1: fgets file not header: id, name, age
function readProfile()
{
    $readProfile = fopen(__DIR__ . "/data.csv", "r");
    echo "<table>\n";
    echo "\t<tr>\n";
    echo "\t\t<th>id</th>\n";
    echo "\t\t<th>name</th>\n";
    echo "\t\t<th>age</th>\n";
    echo "\t</tr>\n";
    while (!feof($readProfile)) {
        $line = fgetcsv($readProfile, 1000, ",");
        if($line != false) {
            echo "\t<tr>\n";
            foreach ($line as $value) {
                echo "\t\t<td>$value</td>\n";
            }
            echo "\t</tr>\n";
        } else {
            continue;
        }
    }
    echo "</table>\n";
    fclose($readProfile);
}

// Solution 2: file function with header
function readProfile2()
{
    $readProfile = @file(__DIR__ . "/profile.csv");
    echo "<table>\n";
    foreach ($readProfile as $index => $line) {
        echo "\t<tr>\n";
        $data = explode(',', rtrim($line, "\n"));
        if ($index == 0) {
            foreach ($data as $value) {
                echo "\t\t<th>$value</th>\n";
            }
        } else {
            foreach ($data as $value) {
                echo "\t\t<td>$value</td>\n";
            }
        }
        echo "\t</tr>\n";
    }
    echo "</table>";
}
echo "Solution 1\n";
readProfile();
echo "Solution 2\n";
readProfile2();
