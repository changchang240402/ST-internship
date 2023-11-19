<?php

class BankAccount
{
    private $name;
    private $balance;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function interestRate()
    {
        $interestRate = 1.2;
        $interest = $this->balance * ($interestRate / 100);

        return $interest;
    }

    public final function interest()
    {
        return $this->balance += $this->interestRate();
    }
}
