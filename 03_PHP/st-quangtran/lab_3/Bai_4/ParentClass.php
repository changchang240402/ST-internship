<?php

class ParentClass
{
    final public function finalMethod()
    {
        // method body
    }
}

final class ChildClass extends ParentClass
{
    public function finalMethod()
    {
        // method body
    }
}

class GrandClass extends ChildClass
{
    // constants, properties, methods
}
