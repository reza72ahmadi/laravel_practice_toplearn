<?php

namespace App\Http\Message;

use Psr\Http\Message\MessageInterface;

class MessageService
{

    private $message;

    public function __construct(MessageInterface $message)
    {
        $this->$message = $message;
    }

    public function send()
    {
        return $this->message->fire();
    }
}
