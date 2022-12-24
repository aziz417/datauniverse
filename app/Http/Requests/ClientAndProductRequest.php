<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientAndProductRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'type' => 'required',
            'link' => 'nullable',
            'serial' => 'nullable',
            'description' => 'nullable',
        ];

        if (request()->isMethod('post')) {
            $rules['image'] = 'nullable';
            $rules['upload_file'] = 'nullable';
        }

        if (request()->isMethod('put') || request()->isMethod('patch')) {
            $rules['image'] = 'nullable';
            $rules['upload_file'] = 'nullable';
        }

        return $rules;
    }
}
