<?php

trait Students
{
    public function callName()
    {
        echo "Student Name", PHP_EOL;
    }
}

trait Employees
{
    public function callName()
    {
        echo "Employee Name", PHP_EOL;
    }
}

class Persons
{
    use Students, Employees {
        Students::callName insteadof Employees;
        Employees::callName as employeeCallName;
    }
}

$person = new Persons();
echo "Student: ";
$person->callName();
echo "Employee: ";
$person->employeeCallName();
