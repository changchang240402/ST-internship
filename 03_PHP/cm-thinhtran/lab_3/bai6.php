<?php

trait TraitA
{
    public function methodOne()
    {
        echo "Method One of Trait A" . PHP_EOL;
    }
    public function methodTwo()
    {
        echo "Method Two of Trait A" . PHP_EOL;
    }
}

trait TraitB
{
    public function methodOne()
    {
        echo "Method One of Trait B" . PHP_EOL;
    }
    public function methodTwo()
    {
        echo "Method Two of Trait B" . PHP_EOL;
    }
}

class MyClass
{
    use TraitA {
        TraitA::methodTwo insteadof TraitB;
    }

    use TraitB {
        TraitB::methodOne insteadof TraitA;
    }



    public function useMethodTwoOfTraitA()
    {
        $this->methodTwo();
    }

    public function useMethodOneOfTraitB()
    {
        $this->methodOne();
    }
}

$myObject = new MyClass();
$myObject->useMethodTwoOfTraitA();
$myObject->useMethodOneOfTraitB();
