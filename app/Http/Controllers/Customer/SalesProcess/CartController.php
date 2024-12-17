<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart() {}
    public function updateCart() {}

    public function addToCart(Product $product, Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'color' => 'nullable|exists:product_colors,id',
                'guarantee' => 'nullable|exists:guarantees,id',
                'number' => 'numeric|min:1|max:12',
            ]);
            $cartitems = CartItem::where('product_id', $product->id)->where('user_id', auth()->user()->id)->get();
            if (!isset($request->color)) {
                $request->color = null;
            }
            if (!isset($request->guarantee)) {
                $request->guarantee = null;
            }
            foreach ($cartitems as $cartitem) {
                if ($cartitem->color_id == $request->color && $cartitem->guarantee_id == $request->guarantee) {
                    if ($cartitem->number != $request->number) {
                        $cartitem->update(['number' => $request->number]);
                    }
                    return back();
                }

                $inputs = [];
                $inputs['color_id'] = $request->color;
                $inputs['guarantee_id '] = $request->guarantee;
                $inputs['user_id'] = auth()->user()->id;
                $inputs['product_id'] = $product->id;

                CartItem::create($inputs);

                return back();
            }
        } else {
        }
    }

    public function removeFromCart() {}
}
