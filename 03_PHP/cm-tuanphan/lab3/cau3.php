<?php

class Logger
{
    public static $logCount;
    
    public static function showLogCount()
    {
        self::$logCount++;
        echo "Total log count " . self::$logCount;
    }
}
Logger::showLogCount();
