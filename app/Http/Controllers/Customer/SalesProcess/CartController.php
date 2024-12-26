<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        Auth::loginUsingId(1);
        if (Auth::check()) {
            $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
            $relatedProducts = Product::all();
            return view('customer.sales-process.cart', compact('cartItems', 'relatedProducts'));
        } else {
            return redirect()->route('auth.customer.login-register-form');
        }
    }
    public function updateCart() {}


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


    public function removeFromCart(CartItem $cartItem)
    {

        if ($cartItem->user_id === Auth::user()->id) {
            $cartItem->delete();
        }
        return back();
    }
}
