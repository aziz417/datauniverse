<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrustedCompanyRequest extends FormRequest
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
        $rules = [
            'title' => 'nullable',
            'website_link' => 'nullable',
        ];

        if (request()->isMethod('post')) {
            $rules['image']  = 'required';
        }

        if (request()->isMethod('put') || request()->isMethod('patch')) {
            $rules['image']  = 'nullable';
        }

        return $rules;
    }
}
