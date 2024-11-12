<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Copan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'amount',
        'amount_type',
        'discount_ceiling',
        'type',
        'status',
        'start_date',
        'end_date',
        'user_id'
    ];
}
