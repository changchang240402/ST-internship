<?php

trait Trait1
{
    public function callName()
    {
        echo "Trait1 is calling the name." . PHP_EOL;
    }
}

trait Trait2
{
    public function callName()
    {
        echo "Trait2 is calling the name." . PHP_EOL;
    }
}

class MyClass
{
    use Trait1 {
        Trait1::callName insteadof Trait2;
    }
    use Trait2 {
        Trait2::callName as aliasCallName;
    }
}

$myObject = new MyClass();
$myObject->callName();
$myObject->aliasCallName();
