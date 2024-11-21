<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'payments';

    protected $fillable = [
        'amount',
        'user_id',
        'status',
        'type',
        'paymentable_id',
        'paymentable_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function paymentable(): morphTo
    {
        return $this->morphTo();
    }
}
