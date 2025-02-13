<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArrayExpertiseRequest extends FormRequest
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
            'category' => ['required', 'numeric'],
            'title' => ['required', 'string'],

            'slug' => ['required', 'string'],
            'link_name' => ['required', 'string'],
            'banner_cta_name' => ['required', 'string'],
            'banner_cta_link' => ['required', 'string'],
        ] + $request;
    }
}
