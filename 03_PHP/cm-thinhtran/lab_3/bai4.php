<?php

class ParentClass
{
    final public function speak()
    {
        echo "Hello";
    }
}

final class ChildClass extends ParentClass
{
    // public function speak() {}
}
    // class GrandChildClass extends ChildClass {}
