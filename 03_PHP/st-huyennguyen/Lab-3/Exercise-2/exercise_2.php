<?php

require("ResizableInterface.php");
require("ShapeClass.php");
require("CircleClass.php");
require("RectangleClass.php");

$circle = new Circle(5);
echo "Hinh tron:", PHP_EOL;
echo "Ban kinh: " . $circle->getRadius(), PHP_EOL;
$circle->resize(2);
echo "Ban kinh sau khi resize: " . $circle->getRadius(), PHP_EOL;
echo "Dien tich: " . number_format($circle->calculateArea(), 4), PHP_EOL;

$rectangle = new Rectangle(30, 20);
echo "Hinh chu nhat:", PHP_EOL;
echo "Chieu dai: " . $rectangle->getWidth() . ", chieu rong: "
    . $rectangle->getHeight(), PHP_EOL;
$rectangle->resize(1, 1.5);
echo "Sau khi resize: Chieu dai " . $rectangle->getWidth()
    . ", chieu rong " . $rectangle->getHeight(), PHP_EOL;
echo "Dien tich: " . $rectangle->calculateArea(), PHP_EOL;
