<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' => 'nullable|string|max:255|',
            'serial' => 'nullable',
            'btn_link' => 'nullable|url',
        ];

        if (request()->isMethod('post')) {
            $rules['image']  = 'required|mimes:jpg,jpeg,bmp,png,webp';
        }

        if (request()->isMethod('put') || request()->isMethod('patch')) {
            $rules['image']  = 'nullable|mimes:jpg,jpeg,bmp,png,webp';
        }

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => '"Title"',
            'image' => '"Image"',
        ];
    }
}
