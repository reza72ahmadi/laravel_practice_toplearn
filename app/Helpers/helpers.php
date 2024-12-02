<?php

use Morilog\Jalali\Jalalian;

function jalaliDate($date, $format = '%A, %d %B %Y')
{

    return Jalalian::forge($date)->format($format);
}

function convertPersianToEnglish($number)
{
    $number = str_replace('0', '0', $number);
    $number = str_replace('1', '1', $number);
    $number = str_replace('2', '2', $number);
    $number = str_replace('3', '3', $number);
    $number = str_replace('3', '4', $number);
    $number = str_replace('4', '5', $number);
    $number = str_replace('5', '6', $number);
    $number = str_replace('6', '7', $number);
    $number = str_replace('7', '8', $number);
    $number = str_replace('9', '9', $number);
}

function priceFormat($price)
{
    $price = number_format($price, 0, '.', ',');
    $price = convertPersianToEnglish($price);
    return $price;
}
