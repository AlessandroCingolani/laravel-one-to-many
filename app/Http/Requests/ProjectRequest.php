<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:100',
            'description' => 'required|min:5',
            'link' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least :min characters',
            'name.max' => 'Name cannot be greater than :max characters',
            'text.required' => 'Text cannot be empty',
            'text.min' =>  'Text must be at least :min characters',
            'link.required' => 'Link cannot be empty',
            'link.min' =>  'Link must be at least :min characters',
        ];
    }
}
