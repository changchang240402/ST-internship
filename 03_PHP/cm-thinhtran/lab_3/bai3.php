<?php

class Logger
{
    private static $logCount;
    public static function showLogCount()
    {
        echo PHP_EOL . self::$logCount;
    }

    public function log($message)
    {
        self::$logCount += 1;
        echo PHP_EOL . "log: " . $message;
    }
}

$logger = new Logger();
$logger->log("message1");
$logger->log("message1");
$logger->log("message1");
$logger->log("message1");
Logger::showLogCount();
