<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Models\Notify\SMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\SMSRequest;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $smss = SMS::all();
        return view('admin.notify.sms.index', compact('smss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notify.sms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SMSRequest $request)
    {
        $inputs = $request->all();
        if (isset($request->published_at)) {
            $realTimeStamp = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", intval($realTimeStamp));
            $inputs['author_id'] = 1;
        }

        SMS::create($inputs);
        return redirect()->route('admin.notify.sms.index')
            ->with('swal-success', ' پیامک شما با موفقیت ثبت شد');
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
    public function edit(SMS $sms)
    {
        return view('admin.notify.sms.edit', compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SMSRequest $request, SMS $sms)
    {
        $inputs = $request->all();
        if (isset($request->published_at)) {
            $realTimeStamp = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", intval($realTimeStamp));
            $inputs['author_id'] = 1;
        }

        $sms->update($inputs);
        return redirect()->route('admin.notify.sms.index')
            ->with('swal-success', ' پیامک شما با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SMS $sms)
    {
        $sms->delete();
        return redirect()->route('admin.notify.sms.index')
            ->with('swal-success', ' پیامک شما با موفقیت حذف شد');
    }

    // status
    public function status(SMS $sms)
    {

        $sms->status = $sms->status == 0 ? 1 : 0;
        $result =  $sms->save();

        if ($result) {
            if ($sms->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
