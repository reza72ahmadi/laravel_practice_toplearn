<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question' => "required|min:10|max:500|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u",
            'answer' => "required|min:10|max:500|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u",
            'tags' => 'required|string',
            // 'regex:/^[ا-ی۰-۹ء-ي.,?!،؛()«»\s]+$/u'

        ];
    }
}
