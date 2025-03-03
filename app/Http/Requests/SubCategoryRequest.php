<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = [];
        if (!request('id')) {
            $request['icon'] = 'required|file|mimes:jpg,jpeg,png,gif|max:2048';
            $request['image'] = 'required|file|mimes:jpg,jpeg,png,gif|max:2048';
        }
        return [
            'cat_id' => ['required', 'string'],
            'title' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'link_name' => ['required', 'string'],
            'banner_cta_name' => ['required', 'string'],
            'banner_cta_link' => ['required', 'string'],
            'image_alt' => ['nullable', 'string'],
            'image_title' => ['nullable', 'string'],
            'status' => ['required', 'string'],
        ] + $request;
    }
}
