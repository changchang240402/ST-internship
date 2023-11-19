<?php

class Zoology
{
    final public function move()
    {
        return "An animal that crawls on land";
    }
}

final class GreenIguana extends Zoology
{
    public function color()
    {
        return "Green iguanas are green";
    }
}

$class = new GreenIguana();
echo $class->move() . PHP_EOL;
echo $class->color() . PHP_EOL;
