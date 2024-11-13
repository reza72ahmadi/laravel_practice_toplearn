<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Order;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function all()
    {
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders'));
    }
    public function newOrders()
    {
        $orders = Order::where('order_status', 0)->get();
        foreach ($orders as $order) {
            $order->order_status = 1;
            $order->save();
        }
        return view('admin.market.order.index', compact('orders'));
    }
    public function sending()
    {
        $orders = Order::where('delivery_status', 0)->get();
        return view('admin.market.order.index', compact('orders'));
    }
    public function unpaid()
    {
        $orders = Order::where('payment_status', 0)->get();
        return view('admin.market.order.index', compact('orders'));
    }
    public function canceled()
    {
        $orders = Order::where('order_status', 4)->get();
        return view('admin.market.order.index', compact('orders'));
    }
    public function returned()
    {
        $orders = Order::where('order_status', 5)->get();
        return view('admin.market.order.index', compact('orders'));
    }
    public function show()
    {
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders'));
    }
    public function changeOrderStatus()
    {
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders'));
    }
    public function changeSendStatus()
    {
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders'));
    }
    public function cancelOrder()
    {
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders'));
    }
}
