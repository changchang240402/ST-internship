<?php

trait TraitA
{
    public function methodOneA()
    {
        echo 'Method One from Trait A', PHP_EOL;
    }

    public function methodTwoA()
    {
        echo 'Method Two from Trait A', PHP_EOL;
    }
}

trait TraitB
{
    public function methodOneB()
    {
        echo 'Method One from Trait B', PHP_EOL;
    }

    public function methodTwoB()
    {
        echo 'Method Two from Trait B', PHP_EOL;
    }
}

class MyClass
{
    use TraitA, TraitB {
        TraitA::methodTwoA insteadof TraitB;
        TraitB::methodOneB insteadof TraitA;
    }

    public function useMethodTwoFromTraitA()
    {
        $this->methodTwoA();
    }
    
    public function useMethodOneFromTraitB()
    {
        $this->methodOneB();
    }
}

$obj = new MyClass();
$obj->useMethodTwoFromTraitA();
$obj->useMethodOneFromTraitB();
