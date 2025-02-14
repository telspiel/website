<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorklifeRequest extends FormRequest
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
            'short_desc' => ['required', 'string'],
            'title' => ['required', 'string'],
            'cta_name' => ['required', 'string'],
            'cta_link' => ['required', 'string'],
            'status' => ['required', 'string'],
        ] + $request;
    }
}
