<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;

class LeadershipRequest extends FormRequest
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
        $main_id='';
        if (!request('id')) {
            $request['image'] = 'required|file|mimes:jpg,jpeg,png,gif|max:2048';
        }
        if (request('id')) {
            $main_id = Crypt::decrypt(request('id'));
        }
        return [
            'short_desc' => ['required', 'string'],
            'name' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'linkedin_url' => ['required', 'string'],
            // 'position' => ['required', 'string', 'unique:about_company_testimonials,position,' . decrypt(request('id')) . ',id'],
            'position' => ['required', 'string', Rule::unique('about_company_testimonials')->ignore($main_id, 'id'),],
            'image_alt' => ['nullable', 'string'],
            'image_title' => ['nullable', 'string'],
            'status' => ['required', 'string'],
        ] + $request;
    }
}
