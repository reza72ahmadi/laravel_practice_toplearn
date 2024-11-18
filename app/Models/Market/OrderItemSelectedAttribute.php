<?php

namespace App\Models\Market;

use App\Models\Market\CategoryValue;
use Illuminate\Database\Eloquent\Model;
use App\Models\Market\CategoryAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItemSelectedAttribute extends Model
{
    protected $table = 'order_item_selected_attributes';
    use HasFactory;

    public function categoryAttribute()
    {
        return $this->belongsTo(CategoryAttribute::class);
    }
    public function categoryAttributeValue()
    {
        return $this->belongsTo(CategoryValue::class, 'category_value_id');
    }
}
