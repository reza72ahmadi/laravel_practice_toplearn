<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for the request.
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'introduction' => 'required|string|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'status' => 'required|numeric|in:0,1',
            'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'weight' => 'nullable|numeric|min:1|max:1000',
            'length' => 'required|numeric|min:1|max:1000',
            'width' => 'required|numeric|min:1|max:1000',
            'height' => 'required|numeric|min:1|max:1000',
            'price' => 'required|numeric',
            'marketable' => 'required|numeric|in:0,1',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:product_categories,id',
            'published_at' => 'required|numeric',
            'meta_key.*' => 'required',
            'meta_value.*' => 'required',
        ];

        if ($this->isMethod('post')) {
            $rules['image'] = 'required|' . $rules['image'];
        }

        return $rules;
    }
}
