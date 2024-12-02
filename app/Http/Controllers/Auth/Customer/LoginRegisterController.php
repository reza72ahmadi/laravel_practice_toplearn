<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;


class LoginRegisterController extends Controller
{
    public function LoginRegisterForm()
    {
        return view('customer.auth.login-register');
    }



    public function loginRegister(LoginRegisterRequest $request)
    {
       
        // Get all inputs from the requestS
        $inputs = $request->all();
        // Validate if the input is an email
        if (!filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
            $errorText = 'شناسه شما ایمیل نیست';
            return redirect()
                ->route('auth.customer.login-register-form')
                ->withErrors(['email' => $errorText]);
        }
   
        // Check if the user exists by email
        $user = User::where('email', $inputs['email'])->first();
        // If user does not exist, create a new one
        if (empty($user)) {
            $newUser = [
                'email' => $inputs['email'],
                'password' => bcrypt('11223344'), // Securely hash the default password
                'activation' => 1, // Activate the user by default
            ];
            $user = User::create($newUser);
        }
    
        // Generate an OTP code and a token
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);

        // Store the OTP details
        Otp::create ([
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $inputs['email'],
            'type' => 1, // Type 1 indicates email
        ]);


        // Prepare and send an email for verification
        $emailService = new EmailService();
        $details = [
            'subject' => 'ایمیل فعال سازی',
            'body' => "کد فعال سازی شما: $otpCode",
        ];
        $emailService->setDetails($details);
        $emailService->setFrom('noReply@example.com', 'Example');
        $emailService->setSubject('Verification Code');
        $emailService->setTo($inputs['email']);
        $messageService = new MessageService($emailService);
        
        // Send the email
        
        $messageService->send();
        // Redirect to the OTP verification form with a success message
        return redirect()->route('auth.customer.otp-verification-form')
            ->with('success', 'کد فعال‌سازی ارسال شد.');
    }
}

