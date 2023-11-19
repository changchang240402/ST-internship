<?php
require('Traits.php');

class User
{
    use Say, Whisper {
        Whisper::callName insteadof Say;
        Say::callName as sayCallName;
    }
}

$user = new User();
$user->callName("Bao");
echo PHP_EOL;
$user->sayCallName("Bao");
