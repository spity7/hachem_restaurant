<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'name' => ['string', 'required', Rule::unique('employees')->ignore($this->employee)],
            'phone' => ['string', 'nullable'],
            'address' => ['string', 'nullable'],
            'initial_salary' => ['numeric', 'required'],
            'notes' => ['string', 'nullable'],
        ];
    }
}
