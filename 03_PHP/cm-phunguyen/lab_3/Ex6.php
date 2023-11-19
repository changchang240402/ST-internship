<?php

trait A
{
    public function methodA1()
    {
        echo "Method A1 from Trait A" . PHP_EOL;
    }

    public function methodA2()
    {
        echo "Method A2 from Trait A" . PHP_EOL;
    }
}

trait B
{
    public function methodA1()
    {
        echo "Method A1 from Trait B" . PHP_EOL;
    }

    public function methodA2()
    {
        echo "Method A2 from Trait B" . PHP_EOL;
    }
}

class MyClass
{
    use A, B {
        A::methodA2 insteadof  B;
        B::methodA1 insteadof A;
    }

    public function two()
    {
        $this->methodA2();
    }

    public function one()
    {
        $this->MethodA1();
    }
}

/** * Test */
$obj = new MyClass();
$obj->Two();
$obj->One();
