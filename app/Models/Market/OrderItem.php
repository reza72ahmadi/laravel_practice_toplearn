<?php

namespace App\Models\Market;

use App\Models\Market\Product;
use App\Models\Market\AmazingSale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function singleProduct()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function amazingSale()
    {
        return $this->belongsTo(AmazingSale::class,'amazing_sale_id');
    }

    public function productColor()
    {
        return $this->belongsTo(ProductColor::class,'color_id');
    }

    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class,'guarantee_id');
    }

    public function orderItemAttributes()
    {
        return $this->hasMany(OrderItemSelectedAttribute::class, 'order_item_id');
    }
}
