<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Models\Notify\Email;
use Illuminate\Http\Request;
use App\Models\Notify\EmailFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\EmailFileRequest;

class EmailFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Email $email)
    {
        return view('admin.notify.email-file.index', compact('email'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Email $email)
    {
        $emails = Email::all();
        return view('admin.notify.email-file.create', compact('emails', 'email'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailFileRequest $request, Email $email)
    {
        $inputs = $request->all();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $fileType = $file->getClientOriginalExtension();
            $file->storeAs('uploads', $fileName, 'public');
            if ($request === false) {
                return redirect()->route('admin.notify.email-file.index', $email->id)
                    ->with('swal-error', 'آپلود فایل شمابا خطا مواجه شد');
            } else {
                $inputs['public_mail_id'] = $email->id;
                $inputs['file_path'] = 'uploads/' . $fileName;
                $inputs['file_size'] = $fileSize;
                $inputs['file_type'] = $fileType;
            }
            //   $email->files()->create($inputs);
            EmailFile::create($inputs);
            return redirect()->route('admin.notify.email-file.index', $email->id)
                ->with('swal-success', 'فایل شما با موفقیت ثبت شد');
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailFile $file)
    {
        $email_id = $file->public_mail_id;
        $file->delete();
        return redirect()->route('admin.notify.email-file.index', $email_id)
            ->with('swal-success', 'ایمیل شما با موفقیت حذف شد');
    }



    // status
    public function status(EmailFile $file)
    {

        $file->status = $file->status == 0 ? 1 : 0;
        $result =  $file->save();
        if ($result) {
            if ($file->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
