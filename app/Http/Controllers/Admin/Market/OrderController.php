<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Order;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Models\Market\OrderItem;
use App\Models\Market\AmazingSale;

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
    public function show(Order $order)
    {
        return view('admin.market.order.show', compact('order'));
    }

    // detailes
    public function detailes(Order $order)
    {
        return view('admin.market.order.detailes', compact('order'));
    }

    // changeOrderStatus
    public function changeOrderStatus(Order $order)
    {
        switch ($order->order_status) {
            case 1:
                $order->order_status = 2;
                break;
            case 2:
                $order->order_status = 3;
                break;
            case 3:
                $order->order_status = 4;
                break;
            case 4:
                $order->order_status = 5;
                break;
            case 5:
                $order->order_status = 6;
                break;
            default:
                $order->order_status = 1;
                break;
        }
        $order->save();
        return back();
    }

    // changeSendStatus
    public function changeSendStatus(Order $order)
    {
        switch ($order->delivery_status) {
            case 0:
                $order->delivery_status = 1;
                break;
            case 1:
                $order->delivery_status = 2;
                break;
            case 2:
                $order->delivery_status = 3;
                break;
            default:
                $order->delivery_status = 0;
                break;
        }
        $order->save();
        return back();
    }

    // cancelOrder
    public function cancelOrder(Order $order)
    {
        $order->order_status = 4;
        $order->save();
        return back();
    }
}
