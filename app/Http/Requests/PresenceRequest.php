<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresenceRequest extends FormRequest
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
        }
        return [
            'iframe' => ['required', 'string'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string','email'],
            'phone_no' => ['required', 'string'],
            'status' => ['required', 'string'],
        ] + $request;
    }
}
