<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'amount',
        'delivery_time',
        'delivery_time_unit',
        'status'
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
