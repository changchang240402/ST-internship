<?php

trait TraitA
{
    function method1()
    {
        return 'Method 1 of TraitA';
    }

    function method2()
    {
        return 'Method 2 of TraitA';
    }
}

trait TraitB
{
    function method1()
    {
        return 'Method 1 of TraitB';
    }

    function method2()
    {
        return 'Method 2 of TraitB';
    }
}

class Hello
{
    use TraitA, TraitB {
        TraitA::method2 insteadof TraitB;
        TraitB::method1 insteadof TraitA;
    }

    function hello1()
    {
        return $this->method2();
    }

    function hello2()
    {
        return $this->method1();
    }
}

$hello = new Hello();
echo $hello->hello1() . "\n";
echo $hello->hello2();
