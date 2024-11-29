<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $casts = ['image' => 'array'];

    protected $fillable = [
        'title',
        'image',
        'url',
        'position',
        'status',
    ];

    public static $position = [
        0 => 'اسلاید شو(صفحه اصلی)',
        1 => 'کناراسلاید شو(صفحه اصلی)',
        2 => ' دوبنر تبلیغی بین دو اسلایدر(صفحه اصلی)',
        3 => ' بنر تبلیغی بزرگ پایین دو اسلایدر(صفحه اصلی)',
    ];
}
