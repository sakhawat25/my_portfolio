<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class StoreEducationRequest extends FormRequest
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
            'institution' => 'required|string|max:100',
            'grade_type' => 'nullable|string|in:cgpa,percentage,grade',
            'grade' => 'nullable|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'currently_studying' => 'integer|in:0,1',
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
        Session::flash('showAddEducationModel', true);

        // Redirect back with the flash message and old input
        $exception = $validator->getException();

        throw (new $exception($validator))->errorBag($this->errorBag)->redirectTo($this->getRedirectUrl());
    }
}
