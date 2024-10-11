<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => "required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
            'url' => 'required|min:5|max:50|regex:/^[a-zA-Z0-9][a-zA-Z0-9]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/u',
            'status' => 'required|numeric|in:0,1',
            'parent_id' => 'nullable|integer|min:1|max:1000000000000|exists:menus,id',

        ];
    }
}
