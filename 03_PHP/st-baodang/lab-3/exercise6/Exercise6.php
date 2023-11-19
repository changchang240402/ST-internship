<?php
require('Traits.php');

class Child
{
    use A, B {
        A::two as ATwo;
        B::one as BOne;
    }

    public function one()
    {
        $this->ATwo();
    }

    public function two()
    {
        $this->BOne();
    }
}

$c = new Child();
$c->one();
echo PHP_EOL;
$c->two();
