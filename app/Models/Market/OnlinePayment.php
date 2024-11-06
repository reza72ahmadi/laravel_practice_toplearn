<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class OnlinePayment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'online_payments';

    protected $fillable = [
        'amount',
        'user_id',
        'status',
        'gateway',
        'transaction_id',
        'bank_first_response',
        'bank_second_response'
    ];
    public function payments(): MorphMany
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}
