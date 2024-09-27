<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
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
                'name' => "required|max:120|min:2",
                'description' => "required|max:500|min:5",
                'slug' => 'nullable',
                'image' => 'required',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        } else {
            return [
                'name' => "required|max:120|min:2",
                'description' => "required|max:500|min:5",
                'slug' => 'nullable',
                'image' => '',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }
    }
}
