<?php

namespace App\Http\Services\Message\Email;

use Illuminate\Support\Facades\Mail;
use App\Http\Interfaces\MessageInterface;
//use App\Http\Services\Message\Email\MailViewProvider;

class EmailService implements MessageInterface
{
    private $details;
    private $subject;
    private $from = [
        ['address' => null, 'name' => null],
    ];
    private $to;

    /**
     * Send the email using the Mail facade.
     */
    public function fire()
    {
        Mail::to($this->to)->send(new MailViewProvider($this->details, $this->subject, $this->from));
        return true;
    }

    /**
     * Get email details.
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set email details.
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * Get the email subject.
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the email subject.
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get the 'from' email address and name.
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set the 'from' email address and name.
     */
    public function setFrom($address, $name)
    {
        $this->from = [
            [
                'address' => $address,
                'name' => $name,
            ],
        ];
    }

    /**
     * Get the recipient's email address.
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the recipient's email address.
     */
    public function setTo($to)
    {
        $this->to = $to;
    }
}
