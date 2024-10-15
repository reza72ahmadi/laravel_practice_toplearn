<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Models\Notify\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\EmailRequest;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emails = Email::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.notify.email.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notify.email.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailRequest $request)
    {
        $inputs = $request->all();
        if (isset($request->published_at)) {
            $realTimeStamp = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", intval($realTimeStamp));
            $inputs['author_id'] = 1;
        }

        Email::create($inputs);
        return redirect()->route('admin.notify.email.index')
            ->with('swal-success', ' ایمیل شما با موفقیت ثبت شد');
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
    public function edit(Email $email)
    {
        return view('admin.notify.email.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmailRequest $request, Email $email)
    {
        $inputs = $request->all();
        if (isset($request->published_at)) {
            $realTimeStamp = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", intval($realTimeStamp));
            $inputs['author_id'] = 1;
        }

        $email->update($inputs);
        return redirect()->route('admin.notify.email.index')
            ->with('swal-success', ' ایمیل شما با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        $email->delete();
        return redirect()->route('admin.notify.email.index')
            ->with('swal-success', ' ایمیل شما با موفقیت حذف شد');
    }
    // status
    public function status(Email $email)
    {

        $email->status = $email->status == 0 ? 1 : 0;
        $result =  $email->save();

        if ($result) {
            if ($email->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
