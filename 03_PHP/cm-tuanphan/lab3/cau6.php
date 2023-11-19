<?php

require("cau6_TraitA.php");
require("cau6_TraitB.php");

class useTraitCallName
{
    use cau6_TraitA, cau6_TraitB {
        cau6_TraitA::two as private ChildOne;
        cau6_TraitB::one as private ChildTwo;
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

$obj = new useTraitCallName();
echo $obj->one();
echo $obj->two();
