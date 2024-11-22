<?php

use App\Http\interfaces\MessageInterface;


class SmsService implements MessageInterface
{

    private $from;
    private $text;
    private $to;
    private $isFlash = true;

    public function fire() {}

    public function getFrom()
    {
        return $this->from;
    }
    public function setFrom($from)
    {
        return $this->from;
    }

    public function gettext()
    {
        return $this->text;
    }
    public function settext($text)
    {
        return $this->text;
    }

    public function getto()
    {
        return $this->to;
    }
    public function setto($to)
    {
        return $this->to;
    }

    public function getisFlash()
    {
        return $this->isFlash;
    }
    public function setisFlash($isFlash)
    {
        return $this->isFlash;
    }
}

