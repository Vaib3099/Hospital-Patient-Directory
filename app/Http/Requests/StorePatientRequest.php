<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'patient_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'phone_number' => 'required|integer|max:9999999999|min:1000000000',
            'hospital_id' => 'required|exists:hospitals,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480'
        ];
    }
}
