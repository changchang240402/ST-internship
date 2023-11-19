<?php

class ParentClass
{
    final public function myMethod()
    {
        echo "This method cannot be overridden by a child class.";
    }
}

final class ChildClass extends ParentClass
{
    // Outcome: Cannot override final method ParentClass::myMethod()
    // public function myMethod() {

    // }
}

// Outcome: Class GrandChildClass cannot extend final class ChildClass
class GrandChildClass extends ChildClass
{
}
