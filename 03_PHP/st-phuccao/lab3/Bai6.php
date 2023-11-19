<?php

trait A {
    public function methodOne()
    {
        return "Method One from Trait1";
    }

    public function methodTwo()
    {
        return "Method Two from Trait1";
    }
}

trait B {
    public function methodOne()
    {
        return "Method One from Trait2";
    }

    public function methodTwo()
    {
        return "Method Two from Trait2";
    }
}

class MyClass {
    use A;
    use B {
        A::methodTwo insteadof B; 
        B::methodOne insteadof A; 
    }

    public function callMethodOne()
    {
        return $this->methodTwo();
    }

    public function callMethodTwo()
    {
        return $this->methodOne();
    }
}

$myObject = new MyClass();

echo $myObject->callMethodOne() . PHP_EOL;

echo $myObject->callMethodTwo() . PHP_EOL;
