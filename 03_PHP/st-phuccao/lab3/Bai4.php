<?php

// A class has a method does not allow override by a child class
class A
{
    final public function display()
    {
        echo "Hello world!";
    }
}

//A class that the child class is not allow inheritance
final class B extends A
{
    public function displayDetails()
    {
        echo "Hello ST!";
    }
}
