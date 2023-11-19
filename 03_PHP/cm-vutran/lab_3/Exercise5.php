<?php

trait Trait1
{
    function callName()
    {
        return "Trait1 hehe";
    }
}

trait Trait2
{
    function callName()
    {
        return "Trait2 hihi";
    }
}

class Hello
{
    use Trait1, Trait2 {
        Trait1::callName insteadof Trait2;
        Trait2::callName as trait2Name;
    }
}

$hello = new Hello();
echo $hello->callName()."\n";
echo $hello->trait2Name();
