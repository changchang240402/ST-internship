<?php

class Logger
{
    static private $logCount = 0;

    public function __construct()
    {
        self::$logCount += 1;
    }

    public static function totalLogCount()
    {
        return self::$logCount;
    }
}
echo Logger::totalLogCount() . PHP_EOL;
new Logger();
new Logger();
new Logger();
new Logger();
echo Logger::totalLogCount() . PHP_EOL;
new Logger();
new Logger();
new Logger();
new Logger();
echo Logger::totalLogCount() . PHP_EOL;
