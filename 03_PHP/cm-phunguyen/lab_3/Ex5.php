<?php

trait Message1
{
    public function callName()
    {
        return 'Phu';
    }
}
trait Message2
{
    public function callName()
    {
        return 'Thinh';
    }
}
class A
{
    use Message1, Message2 {
        Message1::callName insteadof Message2;
        Message2::callName as callName2;
    }
}

/** * Test */
$myObj = new A();
echo "Ham callName cho Trait Message1 : " . $myObj->callName() . "\n Ham callName cho Trait Message2" . $myObj->callName2();
