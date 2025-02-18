<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebinarRequest extends FormRequest
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
            'short_desc' => ['required', 'string'],
            'details' => ['required', 'string'],
            'video_link' => ['required', 'string'],
            'cta_name' => ['required', 'string'],
            'third_party_link' => ['required', 'string'],
            'image_alt' => ['required', 'string'],
            'image_tite' => ['required', 'string'],
            'status' => ['required', 'string'],
        ] + $request;
    }
}
