<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaseStudiesRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'shot_desc' => ['required', 'string'],
            'image_alt' => ['required', 'string'],
            'image_title' => ['required', 'string'],
            'website' => ['required', 'string'],
            'youtube_video_link' => ['nullable', 'string'],
            'number_perc_data1' => ['required', 'string'],
            'oneliner_perc_data1' => ['required', 'string'],
            'number_perc_data2' => ['required', 'string'],
            'oneliner_perc_data2' => ['required', 'string'],
            'number_perc_data3' => ['required', 'string'],
            'oneliner_perc_data3' => ['required', 'string'],
            'details' => ['required', 'string'],
            'company_desc' => ['required', 'string'],
            'headquaters' => ['required', 'string'],
            'industry' => ['required', 'string'],
            'product_used' => ['required', 'string'],
            'cta_url' => ['required', 'string'],
        ] + $request;
    }
}
