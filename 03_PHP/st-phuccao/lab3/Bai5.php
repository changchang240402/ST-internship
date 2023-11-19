<?php

trait Trait1
{
    public function callName()
    {
        echo "callName of Trait1";
    }
}

trait Trait2
{
    public function callName()
    {
        echo "callName of Trait2";
    }
}

class MyClass
{
    use Trait1;
    use Trait2 {
        Trait1::callName insteadof Trait2; 
        Trait2::callName as callName2; 
    }
}   

$myObject = new MyClass();

echo $myObject->callName() . PHP_EOL;

echo $myObject->callName2() . PHP_EOL;
