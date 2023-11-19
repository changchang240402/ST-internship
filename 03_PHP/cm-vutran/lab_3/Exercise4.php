<?php

class Person
{
    final function hello()
    {
        return 'Iam Thanh Vu';
    }
}

final class Child extends Person
{
    // Error
    // public function hello()
    // {
    //     return 'Iam child';
    // } 

    function hi()
    {
        return 'Iam child';
    }
}

//Error
// class Child2 extends Child
// {

// }

$child = new Child();
echo $child->hi();
