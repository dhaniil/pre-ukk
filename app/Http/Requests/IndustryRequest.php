<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustryRequest extends FormRequest
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
        if($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            return [
              'name' => 'sometimes|string|max:255',
              'bidang_usaha' => 'sometimes|string|max:255',
              'addess' => 'sometimes|string|max:255',
              'contact' => 'sometimes|string|max:255',
              'email' => 'sometimes|string|max:255|unique:industries,email',
              'guru_pembimbing' => 'sometimes|string|max:255|exists:teachers,id',
            ];
        }
        return [
            'name' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:industries,email',
            'guru_pembimbing' => 'required|string|max:255|exists:teachers,id',
            ];
    }
}
