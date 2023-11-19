<?php

trait Say
{
    public function callName($name)
    {
        echo "She said: Hey! $name";
    }
}

trait Whisper
{
    public function callName($name)
    {
        echo "She whispered: Hey! $name";
    }
}
