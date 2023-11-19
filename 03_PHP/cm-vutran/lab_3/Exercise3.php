<?php

class Logger
{
    static $logCount = 1;

    static function totalLogCount()
    {
        echo "Current logCount: ". self::$logCount++ . "\n";
    }
}

Logger::totalLogCount();
Logger::totalLogCount();
Logger::totalLogCount();
