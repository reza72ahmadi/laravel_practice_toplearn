<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class OfflinePayment extends Model
{
    use HasFactory;
    protected $table = 'offline_payments';

    protected $fillable = [
        'amount',
        'user_id',
        'transaction_id',
        'pay_date',
    ];
    public function payments(): MorphMany
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}
