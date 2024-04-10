<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username' => 'required|string|max:250|unique:users,username,'.$this->user->id,
            'userId' => 'required|string|max:250|unique:users,userId,'.$this->user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'required'
        ];
    }
}
