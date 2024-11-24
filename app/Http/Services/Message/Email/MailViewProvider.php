<?php

namespace App\Http\Services\Message\MailViewProvider;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailViewProvider extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details, $subject, $from)
    {

        return $this->$details = $details;
        return $this->$subject = $subject;
        return $this->$from = $from;
    }

    public function build()
    {
        return $this->subject($this->subject)->view('emails.send-otp');
    }
}
