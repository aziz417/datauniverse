<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $id = $this->post->id ?? null;

        $rules = [
            'title' => 'required|max:300|unique:posts,title,' . $id,
            'categories' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'short_description' => 'nullable',
        ];

        if (request()->isMethod('post')) {
            $rules['image'] = 'required|image';
        }

        if (request()->isMethod('put') || request()->isMethod('patch')) {
            $rules['image'] = 'nullable|image';
        }

        return $rules;
    }
}
