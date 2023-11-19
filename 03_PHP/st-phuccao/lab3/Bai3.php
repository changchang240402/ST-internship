<?php

class Logger
{
    public static $logCount = 0;

    public static function log(?string $message) : void
    {
        echo "Logging: $message" . PHP_EOL;
        self::$logCount++;
    }

    public static function showTotalLog() : void
    {
        echo "Total Log: " . self::$logCount;
    }
}

Logger::log("This is a log message.");
Logger::log("Another log message.");
Logger::showTotalLog();
