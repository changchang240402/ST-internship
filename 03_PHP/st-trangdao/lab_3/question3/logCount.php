<?php

class Loggger
{
    private static $logCount = 0;

    public static function log($message)
    {
        echo $message . PHP_EOL;
        self::$logCount++;
    }

    public static function totalLogCount()
    {
        return self::$logCount;
    }
}

$class = new Loggger();
echo Loggger::totalLogCount() . PHP_EOL;
$class->log('message');
echo Loggger::totalLogCount() . PHP_EOL;
$class->log('message');
echo Loggger::totalLogCount() . PHP_EOL;
