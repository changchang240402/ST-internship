<?php

require("Trait.php");

class Notification
{
    use FavouriteSubjest, BestFriend {
        FavouriteSubjest::callName insteadof BestFriend;
        BestFriend::callName as callNameFriend;
    }

    private $friend, $subject;

    public function setFriend($friend)
    {
        $this->friend = $friend;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
}

$notice = new Notification();
$notice->setFriend("A");
$notice->setSubject("Sinh hoc");
$notice->callNameFriend();
$notice->callName();
