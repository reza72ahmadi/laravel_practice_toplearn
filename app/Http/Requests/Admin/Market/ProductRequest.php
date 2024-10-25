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


    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'name' => "required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
                'introduction' => "required|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u",
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'weight' => 'nullable|min:1|max:1000|integer',
                'length' => 'required|min:1|max:1000|integer',
                'width' => 'required|min:1|max:1000|integer',
                'height' => 'required|min:1|max:1000|integer',
                'price' => 'required|numeric',
                'marketable'   => 'required|numeric|in:0,1',
                'brand_id' => 'required|min:1|max:100000000000|regex:/^[0-9 ]+$/u|exists:brands,id',
                'category_id' => 'required|min:1|max:100000000000|regex:/^[0-9 ]+$/u|exists:product_categories,id',
                'published_at' => 'required|numeric',

            ];
        } else {
            return [
                'name' => "required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
                'introduction' => "required|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u",
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'weight' => 'nullable|min:1|max:1000|integer',
                'length' => 'required|min:1|max:1000|integer',
                'width' => 'required|min:1|max:1000|integer',
                'height' => 'required|min:1|max:1000|integer',
                'price' => 'required|numeric',
                'marketable'   => 'required|numeric|in:0,1',
                'brand_id' => 'required|min:1|max:100000000000|regex:/^[0-9 ]+$/u|exists:brands,id',
                'category_id' => 'required|min:1|max:100000000000|regex:/^[0-9 ]+$/u|exists:product_categories,id',
                'published_at' => 'required|numeric',
            ];
        }
    }
}
