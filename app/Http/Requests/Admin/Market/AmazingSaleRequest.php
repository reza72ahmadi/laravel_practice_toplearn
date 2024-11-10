<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class AmazingSaleRequest extends FormRequest
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
//    public function rules(): array
public function rules(): array
{
    return [
        'percentage' => 'required|numeric|min:0.1|max:100',
        'start_date' => 'required|integer',
        'end_date' => 'required|integer',
        'product_id' => 'required|integer|exists:products,id',
    ];
}


}
