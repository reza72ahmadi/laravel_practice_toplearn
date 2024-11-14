<?php

namespace App\Models\Market;

use App\Models\Market\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    public function city()
    {
        return $this->belongsTo(City::class);
    }
  
}
