<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            // Rules for creating a new user
            return [
                'first_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'last_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'mobile' => 'required|digits:10|unique:users,mobile',
                'email' => 'required|string|email|unique:users,email',
                'activation' => 'required|numeric|in:0,1',
                'profile_photo_path' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            ];
        } else {
            // Rules for updating an existing user
            return [
                'first_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'last_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'mobile' => 'nullable|digits:10|' . Rule::unique('users', 'mobile')->ignore($this->user),
                'email' => 'nullable|string|email|' . Rule::unique('users', 'email')->ignore($this->user),
                'activation' => 'required|numeric|in:0,1',
                'profile_photo_path' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            ];
        }
    }
}
