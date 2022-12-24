<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'header_top_title' =>  ['required', 'string', 'max:100'],
            'description' => ['nullable','string', 'max:300'],
        ];

        if (request()->isMethod('post')) {
            $rules['logo']  = 'required|mimes:jpg,jpeg,bmp,png,webp';
            $rules['parallax_image']  = 'required|mimes:jpg,jpeg,bmp,png,webp';
        }

        if (request()->isMethod('put') || request()->isMethod('patch')) {
            $rules['logo']  = 'image|mimes:jpg,jpeg,bmp,png,webp';
            $rules['parallax_image']  = 'image';
        }

        return $rules;
    }
}
