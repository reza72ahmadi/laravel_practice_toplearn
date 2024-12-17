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

    // public function addToCart(Product $product, Request $request)
    // {
    //     Auth::loginUsingId(1);
    //     if (Auth::check()) {
    //         $request->validate([
    //             'color' => 'nullable|exists:product_colors,id',
    //             'guarantee' => 'nullable|exists:guarantees,id',
    //             'number' => 'numeric|min:1|max:12',
    //         ]);
    //         dd($request);
    //         $cartitems = CartItem::where('product_id', $product->id)->where('user_id', auth()->user()->id)->get();
    //         if (!isset($request->color)) {
    //             $request->color = null;
    //         }
    //         if (!isset($request->guarantee)) {
    //             $request->guarantee = null;
    //         }
    //         foreach ($cartitems as $cartitem) {
    //             if ($cartitem->color_id == $request->color && $cartitem->guarantee_id == $request->guarantee) {
    //                 if ($cartitem->number != $request->number) {
    //                     $cartitem->update(['number' => $request->number]);
    //                 }
    //                 return back();
    //             }

    //             $inputs = [];
    //             $inputs['color_id'] = $request->color;
    //             $inputs['guarantee_id '] = $request->guarantee;
    //             $inputs['user_id'] = auth()->user()->id;
    //             $inputs['product_id'] = $product->id;

    //             CartItem::create($inputs);

    //             return back();
    //         }
    //     } else {
    //     }
    // }
    public function addToCart(Product $product, Request $request)
{
    // Ensure a user is authenticated (you may remove this for production)
    Auth::loginUsingId(1);

    // Check if the user is authenticated
    if (Auth::check()) {
        // Validate incoming request
        $request->validate([
            'color' => 'nullable|exists:product_colors,id',
            'guarantee' => 'nullable|exists:guarantees,id',
            'number' => 'required|numeric|min:1|max:12',
        ]);

        // Retrieve existing cart items for this product and user
        $cartItems = CartItem::where('product_id', $product->id)
            ->where('user_id', auth()->id())
            ->get();

        // Assign default values if color or guarantee is not provided
        $colorId = $request->input('color', null);
        $guaranteeId = $request->input('guarantee', null);

        // Check if the item with the same attributes already exists in the cart
        foreach ($cartItems as $cartItem) {
            if ($cartItem->color_id == $colorId && $cartItem->guarantee_id == $guaranteeId) {
                // Update the quantity if it differs
                if ($cartItem->number != $request->number) {
                    $cartItem->update(['number' => $request->number]);
                }
                return back();
            }
        }

        // Create a new cart item if none exists with the same attributes
        CartItem::create([
            'color_id' => $colorId,
            'guarantee_id' => $guaranteeId,
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'number' => $request->number,
        ]);

        return back()->with('alert-section-success', 'محصول موفقانه به لیست خرید اضافه شد');
    } else {
        return redirect()->route('login')->with('error', 'Please login to add items to your cart.');
    }
}


    public function removeFromCart() {}
}
