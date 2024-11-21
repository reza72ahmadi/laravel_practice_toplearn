<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CopanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // public function rules(): array
    // {

    //     return [
    //         'code' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
    //         'amount_type' => 'required|numeric|in:0,1',
    //         'amount' => [(request()->amount_type == 0) ?: 'max:100', '', 'numeric', 'required'],
    //         'discount_ceiling' => 'required|numeric|min:0|max:10000000000000',
    //         'type' => 'required|numeric|in:0,1',
    //         'status' => 'required|numeric|in:0,1',
    //         'start_date' => 'required|numeric',
    //         'end_date' => 'required|numeric',
    //         'user_id' => 'required_if:type,1|exists:users,id|min:1|max:10000000000000',
    //     ];
    // }


    public function rules(): array
    {
        
        return [
            'code' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'amount_type' => 'required|numeric|in:0,1',
            'amount' => [
                'required',
                'numeric',
                Rule::when($this->input('amount_type') == 0, ['max:100']),
            ],
            'discount_ceiling' => 'required|numeric|min:0|max:10000000000000',
            'type' => 'required|numeric|in:0,1',
            'status' => 'required|numeric|in:0,1',
            'start_date' => 'nullable|numeric',
            'end_date' => 'nullable|numeric',

             'user_id' => 'required_if:type,1|exists:users,id|min:1|max:10000000000000',
        ];
    }
}
