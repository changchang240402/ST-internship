<?php

trait A
{
    private function fun1()
    {
        echo "Trang \n";
    }

    private function fun2()
    {
        echo "listen to music \n";
    }
}

trait B
{
    private function fun1()
    {
        echo "Chang \n";
    }

    private function fun2()
    {
        echo "read book \n";
    }
}
class Chill
{
    use A, B {
        A::fun2 as funA;
        B::fun1 as funB;
    }

    public function fun1()
    {
        $this->funA();
    }

    public function fun2()
    {
        $this->funB();
    }
}

$class = new Chill();
$class->fun1();
$class->fun2();
