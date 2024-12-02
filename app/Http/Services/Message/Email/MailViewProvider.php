<?php

namespace App\Http\Services\Message\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailViewProvider extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    // public $subject;
    // public $from;

    /**
     * MailViewProvider constructor.
     */
    public function __construct($details, $subject, $from)
    {
        $this->details = $details;
        $this->subject = $subject;
        $this->from = $from;
    }

    /**
     * Build the email message.
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.send-otp');
        // return $this->subject($this->subject)
        //             ->from($this->from[0]['address'], $this->from[0]['name'])
        //             ->view('emails.send-otp')
        //             ->with('details', $this->details);
    }
}
