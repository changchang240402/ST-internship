<?php

function recursive($counter)
{
    if ($counter >= 5) {
        return;
    }
    echo "Lần đệ quy thứ " . ($counter + 1) . "\n";
    $counter++;
    recursive($counter);
}
recursive(0);
