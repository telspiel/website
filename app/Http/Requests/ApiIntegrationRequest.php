<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiIntegrationRequest extends FormRequest
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
            $request['uploaded_pdf'] = 'required|file|mimes:pdf|max:2048';
        }
        return [
            'cat_id' => ['numeric', 'required'],
            'sub_cat_id' => ['numeric', 'required'],
            'services_id' => ['numeric', 'required'],
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'cta_name' => ['required', 'string'],
            'image_alt' => ['nullable', 'string'],
            'image_title' => ['nullable', 'string'],
            'status' => ['required', 'string'],
        ] + $request;
    }
}
