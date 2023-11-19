<?php

interface Resizable
{
    public function resize();
}

abstract class Shape
{
    abstract public function calculateArea();
}
