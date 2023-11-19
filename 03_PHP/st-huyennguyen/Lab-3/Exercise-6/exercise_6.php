<?php

require("Parent1Trait.php");
require("Parent2Trait.php");

class Child
{
    use Parent1, Parent2 {
        Parent1::two as private ChildOne;
        Parent2::one as private ChildTwo;
    }

    public function one()
    {
        return $this->ChildOne();
    }

    public function two()
    {
        return $this->ChildTwo();
    }
}

$child = new Child();
$child->one();
$child->two();
