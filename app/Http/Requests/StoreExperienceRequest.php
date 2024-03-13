<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class StoreExperienceRequest extends FormRequest
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
            'position' => 'required|string|max:150',
            'organization' => 'required|string|max:150',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'currently_working' => 'integer',
            'sort' => 'nullable|integer',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        // Set the flash message
        Session::flash('showAddExperienceModal', true);

        // Redirect back with the flash message and old input
        $exception = $validator->getException();

        throw (new $exception($validator))->errorBag($this->errorBag)->redirectTo($this->getRedirectUrl());
    }
}
