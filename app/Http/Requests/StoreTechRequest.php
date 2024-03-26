<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class StoreTechRequest extends FormRequest
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
            'name' => 'required|string|max:150',
            'level' => 'nullable|integer|max:100',
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
        Session::flash('showAddTechModal', true);

        // Redirect back with the flash message and old input
        $exception = $validator->getException();

        throw (new $exception($validator))->errorBag($this->errorBag)->redirectTo($this->getRedirectUrl());
    }
}
