<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
            'video_link' => ['nullable', 'string'],
            'third_party_link' => ['required', 'string'],
            'cta_name' => ['required', 'string'],
            'short_desc' => ['required', 'string'],
            'image_alt' => ['nullable', 'string'],
            'image_title' => ['nullable', 'string'],
            'status' => ['required', 'string'],
        ] + $request;
    }
}
