<?php

trait FavouriteSubjest
{
    private $subject;

    public function callName()
    {
        echo "Mon hoc yeu thich la " . $this->subject, PHP_EOL;
    }
}

trait BestFriend
{
    private $friend;

    public function callName()
    {
        echo "Ban than nhat cua toi la " . $this->friend, PHP_EOL;
    }
}
