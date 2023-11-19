<?php

final class SavingAccount extends BankAccount
{
    public function interestRate()
    {
        $interestRate = 1.8;
        $interest = $this->balance * ($interestRate / 100);

        return $interest;
    }
}
