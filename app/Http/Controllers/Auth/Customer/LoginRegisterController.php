<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;

class LoginRegisterController extends Controller
{
    public function LoginRegisterForm()
    {
        return view('customer.auth.login-register');
    }

    public function LoginRegister(LoginRegisterRequest $request)
    {
        $inputs = $request->all();
        if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {
            $type = 1; // 1 email
            $user = User::where('email', $inputs['id'])->first();
            if (empty($user)) {
                $newUser['email'] = $inputs['id'];
            } elseif (preg_match('/^(+93|0)7\d{8}$', $inputs['id'])) {
                $type = 1; // 0 mobile  
                $inputs['id'] = ltrim($inputs['id'], '0');
                $inputs['id'] = substr($inputs['id'], 0, 2) === '93' ? substr($inputs['id'], 2) : $inputs['id'];
                $inputs['id'] = str_replace('+93', '', $inputs['id']);
                $user = User::where('mobile', $inputs['id'])->first();
                if (empty($user)) {
                    $newUser['mobile'] = $inputs['id'];
                }
            };
        } else {
            $errorText = 'شناسه شما نه مشاره مبایل است نه ایمیلی';
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id', $errorText]);
        }

    }
}
