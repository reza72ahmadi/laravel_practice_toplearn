<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPUnit\Framework\returnSelf;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'color_id',
        'guarantee_id',
        'number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(ProductColor::class);
    }
    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class);
    }
    // product price
    public function cartItemProductPrice()
    {
        $guaranteePriceIncrease = empty($this->guarantee_id) ? 0 : $this->guarantee->price_increase;
        $colorPriceIncrease = empty($this->color_id) ? 0 : $this->color->price_increase;
        return $this->product->price +  $guaranteePriceIncrease + $colorPriceIncrease;
    }
    public function cartItemProductDiscount()
    {
        $cartitemproductprice = $this->cartItemProductPrice();
        $productDiscount = empty($this->product->activeAmazingSales()) ? 0 :
            $cartitemproductprice * ($this->product->activeAmazingSales()->percentage / 100);
        return $productDiscount;
    }
    // number * (productPrice + colorPrcie + guaranteePrice - discountPrice)

    public function cartItemFinalPrice()
    {
        $cartitemproductprice = $this->cartItemProductPrice();
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * ($cartitemproductprice - $productDiscount);
    }
    // number * productDiscount
    public function cartItemFinalDiscount()
    {
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * $productDiscount;
    }
}
