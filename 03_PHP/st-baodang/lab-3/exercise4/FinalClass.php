<?php

class Kitty
{
    private $tailLength;
    private $legs;

    public final function tailWagging()
    {
        return "wag~~";
    }

    public function jumping()
    {
        return "The kitty is jumping!";
    }
}

final class Cat extends Kitty
{
    public function jumping()
    {
        return "The cat is jumping!";
    }
}
