<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Users\AdminUserRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('user_type', 1)->get();
        return view('admin.user.admin-user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.admin-user.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(AdminUserRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('profile_photo_path')) {
            // Get the uploaded file and generate a unique file name
            $profile_photo = time() . '_' . $request->file('profile_photo_path')->getClientOriginalName();

            // Store the file in the 'uploads' directory under the 'public' disk
            $request->file('profile_photo_path')->storeAs('uploads', $profile_photo, 'public');

            // Update the inputs array to include the file path
            $inputs['profile_photo_path'] = 'uploads/' . $profile_photo;
            $inputs['password'] = Hash::make($request->input('password'));
            $inputs['user_type'] = 1;
        }

        // Create the user with the modified inputs array
        User::create($inputs);

        return redirect()->route('admin.user.admin-user.index')
            ->with('swal-success', 'کاربر شما با موفقیت ثبت شد');
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
    public function edit(User $user)
    {

        return view('admin.user.admin-user.edit', compact('user'));
    }

    // update

    public function update(AdminUserRequest $request, User $user)
    {
        // dd($request->all());
        $inputs = $request->all();

        // Hash the password only if it's present in the request
        if (!empty($inputs['password'])) {
            $inputs['password'] = Hash::make($request->input('password'));
        } else {
            // Remove password from inputs if it's not being updated
            unset($inputs['password']);
        }

        if ($request->hasFile('profile_photo_path')) {
            // Generate a unique file name and store the new file
            $profile_photo = time() . '_' . $request->file('profile_photo_path')->getClientOriginalName();
            $request->file('profile_photo_path')->storeAs('uploads', $profile_photo, 'public');
            $inputs['profile_photo_path'] = 'uploads/' . $profile_photo;

            // Delete the old profile photo if it exists
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
        } else {
            // Remove profile_photo_path from inputs if it's not being updated
            unset($inputs['profile_photo_path']);
        }

        // Update the user with the modified inputs array
        $user->update($inputs);

        return redirect()->route('admin.user.admin-user.index')
            ->with('swal-success', 'ادمین سایت شما با موفقیت ویرایش شد');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->forceDelete();
        return redirect()->route('admin.user.admin-user.index')
            ->with('swal-success', 'کاربر شما با موفقیت حذف شد');
    }
    // activation
    public function activation(User $user)
    {
        $user->activation = $user->activation == 0 ? 1 : 0;
        $result =  $user->save();

        if ($result) {
            if ($user->activation == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    // status
    public function status(User $user)
    {
        $user->status = $user->status == 0 ? 1 : 0;
        $result =  $user->save();

        if ($result) {
            if ($user->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
