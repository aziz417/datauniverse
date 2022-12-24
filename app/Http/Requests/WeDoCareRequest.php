<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeDoCareRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
        ];

        if (request()->isMethod('post')) {
            $rules['image']  = 'required|mimes:jpg,jpeg,bmp,png,webp';
        }

        if (request()->isMethod('put') || request()->isMethod('patch')) {
            $rules['image']  = 'image|mimes:jpg,jpeg,bmp,png,webp';
        }

        return $rules;
    }
}
