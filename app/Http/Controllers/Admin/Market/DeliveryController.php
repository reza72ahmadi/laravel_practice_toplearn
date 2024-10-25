<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\DeliveryRequest;
use App\Models\Market\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::all();
        return view('admin.market.delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.market.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryRequest $request, Delivery $delivery)
    {
        Delivery::create($request->validated());
        return redirect()->route('admin.market.delivery.index')
            ->with('swal-success', 'رویش ارسال شما با موفقیت ذخیره شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return view('admin.market.delivery.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryRequest $request, Delivery $delivery)
    {
        $delivery->update($request->validated());
        return redirect()->route('admin.market.delivery.index')
            ->with('swal-success', 'رویش ارسال شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('admin.market.delivery.index')
            ->with('swal-success', 'رویش ارسال شما با موفقیت حذف شد');
    }

    // status
    public function status(Delivery $delivery)
    {

        $delivery->status = $delivery->status == 0 ? 1 : 0;
        $result = $delivery->save();
        if ($result) {
            // -----------------
            if ($delivery->status == 0) {
                return response()->json(['reza' => true, 'checked' => false]);
            } else {
                return response()->json(['reza' => true, 'checked' => true]);
            }
            // ------------------
        } else {
            return response()->json(['reza' => false]);
        }
    }
}
