<?php

namespace App\Http\Requests\Admin\Notify;

use Illuminate\Foundation\Http\FormRequest;

class EmailFileRequest extends FormRequest
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
    // public function rules(): array
    // {
    //     return [
    //         'status' => 'required|numeric|in:0,1',
    //         'file' => 'required|mimes:png,jpg,jpeg,gif,zip,pdf,doc,docx',
    //     ];
    // }
    public function rules(): array
    {
        $validate = [
            'status' => 'required|numeric|in:0,1',
        ];

        if ($this->isMethod('post')) {
            $validate['file'] = 'required|mimes:png,jpg,jpeg,gif,zip,pdf,doc,docx';
        } else {
            $validate['file'] = 'nullable|mimes:png,jpg,jpeg,gif,zip,pdf,doc,docx';
        }

        return $validate;
    }
}
