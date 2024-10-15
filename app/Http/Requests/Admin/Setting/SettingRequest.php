<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
            'description' => "required|max:600|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
            'keywords' => "required|max:60|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
            'logo' => 'required|image|mimes:png,jpg,jpeg,gif',
            'icon' => 'required|image|mimes:png,jpg,jpeg,gif',
        ];
    }
}
