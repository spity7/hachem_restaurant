<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => ['string', 'required', 'unique:employees'],
            'phone' => ['string', 'nullable'],
            'address' => ['string', 'nullable'],
            'initial_salary' => ['integer', 'required'],
            'notes' => ['string', 'nullable'],
        ];
    }
}
