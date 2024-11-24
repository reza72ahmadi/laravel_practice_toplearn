<?php

namespace App\Http\Services\Message\Email;

use App\Http\Interfaces\MessageInterface;

// class EmailService implements MessageInterface
// {
//     private array $details = [];
//     private ?string $subject = null;
//     private array $from = [['address' => null, 'name' => null]];
//     private ?array $to = null;

//     // Fire method - typically used to send the email
//     public function fire(): void
//     {
//         // Example of a basic fire method implementation
//         if (empty($this->to)) {
//             throw new \Exception('Recipient (to) is not set.');
//         }
//         if (empty($this->from[0]['address'])) {
//             throw new \Exception('Sender (from) is not set.');
//         }
//         if (empty($this->subject)) {
//             throw new \Exception('Subject is not set.');
//         }
//         if (empty($this->details)) {
//             throw new \Exception('Email details are not set.');
//         }

//         // Simulating sending an email
//         echo "Email sent successfully!";
//     }

//     // Getter and setter for details
//     public function getDetails(): array
//     {
//         return $this->details;
//     }

//     public function setDetails(array $details): void
//     {
//         $this->details = $details;
//     }

//     // Getter and setter for subject
//     public function getSubject(): ?string
//     {
//         return $this->subject;
//     }

//     public function setSubject(string $subject): void
//     {
//         $this->subject = $subject;
//     }

//     // Getter and setter for from
//     public function getFrom(): array
//     {
//         return $this->from;
//     }

//     public function setFrom(string $address, string $name = ''): void
//     {
//         $this->from = [
//             [
//                 'address' => $address,
//                 'name' => $name
//             ]
//         ];
//     }

//     // Getter and setter for to
//     public function getTo(): ?array
//     {
//         return $this->to;
//     }

//     public function setTo(array $to): void
//     {
//         $this->to = $to;
//     }
// }



class EmailService implements MessageInterface
{

    private $details;
    private $subject;
    private $from = [
        ['address' => null, 'name' => null,]
    ];
    private $to;

    public function fire() {}

    public function getDetails()
    {
        return $this->details;
    }
    public function setDetails($details)
    {
        return $this->details = $details;
    }
    //-------------------------------
    public function getSubject()
    {
        return $this->subject;
    }
    public function setSubject($subject)
    {
        return $this->subject = $subject;
    }
    //------------------------------------
    public function getFrom()
    {
        return $this->from;
    }
    public function setFrom($address, $name)
    {
        return $this->from = [
            [
                'address' => $address,
                'name' => $name
            ]
        ];
    }
    //---------------------------
    public function getTo()
    {
        return $this->to;
    }
    public function setTo($to)
    {
        return $this->to = $to;
    }
};
