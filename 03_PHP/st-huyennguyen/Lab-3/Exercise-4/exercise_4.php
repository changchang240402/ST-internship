<?php

require("BankAccountClass.php");
require("SavingAccountClass.php");

$bank = new BankAccount("Nguyen Thi Cam Huyen", 10000000);
echo $bank->name, PHP_EOL;
echo "So du tai khoan: " . number_format($bank->balance), PHP_EOL;
echo "So du tai khoan sau lai: " . number_format($bank->interest()), PHP_EOL;

$savingAccount = new SavingAccount("Huyen Nguyen T. C.", 5000000);
echo $savingAccount->name, PHP_EOL;
echo "So du tai khoan: " . number_format($savingAccount->balance), PHP_EOL;
echo "Lai suat: " . number_format($savingAccount->interestRate()), PHP_EOL;
echo "So du tai khoan sau lai: " . number_format($savingAccount->interest()), PHP_EOL;
