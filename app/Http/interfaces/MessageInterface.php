<?php

namespace App\Http\Interfaces;

interface MessageInterface
{
    public function fire();
    public function getDetails();
    public function setDetails($details);
    public function getSubject();
    public function setSubject($subject);
    public function getFrom();
    public function setFrom($address, $name);
    public function getTo();
    public function setTo($to);
}
