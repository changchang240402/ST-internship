<?php

trait callName
{
    public function callName()
    {
        echo "This is callName 1" . PHP_EOL;
    }
}
trait callName2
{
    public function callName()
    {
        echo "This is callName 2";
    }
}

class useTraitCallName
{
    use callName, callName2 {
        callName::callName insteadof callName2;
        callName::callName as callName1;
        callName2::callName as callName2;
    }
}

$obj = new useTraitCallName();
echo $obj->callName1();
echo $obj->callName2();
