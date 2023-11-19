<?php

class Logger
{
    public static $logCount = 0;

    /** * Tổng số lần log message */
    public static function totalLogCount($message)
    {
        echo $message . PHP_EOL;
        self::$logCount++;
    }
}

/** * Test */
$logger = new Logger();
$logger->totalLogCount("Message 1");
$logger->totalLogCount("Message 2");
$logger->totalLogCount("Message 3");
echo "Total log count: " . Logger::$logCount . ".";
