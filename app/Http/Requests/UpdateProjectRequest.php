<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'organization' => 'required|string|max:100',
            'description' => 'required|string',
            'tags' => 'nullable|string',
            'image' => 'image|max:1024|mimes:png,jpg,jpeg',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'website' => 'nullable|url',
            'category' => 'required|string|max:100',
        ];
    }
}
