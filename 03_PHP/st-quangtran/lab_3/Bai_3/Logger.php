<?php

class Logger
{
    public static $logCount = 0;
    
    public static function loggerCount($message)
    {
        echo $message, PHP_EOL;
        self::$logCount++;
    }
}

Logger::loggerCount("Log message 1");
Logger::loggerCount("Log message 2");
echo "Total log count: " . Logger::$logCount, PHP_EOL;
