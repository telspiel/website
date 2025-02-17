<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            $request['image'] = 'required|file|mimes:jpg,jpeg,png,gif|max:2048';
        }
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'description' => ['required', 'string'],
            'cta_name' => ['nullable', 'string'],
            'cta_link' => ['required', 'string'],
            'meta_title' => ['required', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'tags' => ['required', 'string'],
            'image_alt' => ['required', 'string'],
            'image_tite' => ['required', 'string'],
            'status' => ['required', 'string'],
        ] + $request;
    }
}
