<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        return [
            'client_name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'status' => ['required', 'string'],
            'logo' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
}
