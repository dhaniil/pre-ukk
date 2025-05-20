<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            if ($this->isMethod('put') || $this->isMethod('patch')) {
                return [
                    'name' => 'sometimes|string|max:255',
                    'gender' => 'sometimes|string|in:L,P',
                    'address' => 'sometimes|string|max:255',
                    'contact' => 'sometimes|string|max:255',
                    'email' => 'sometimes|email|max:255|unique:students,email,' . $this->student->id,
                    'nis' => 'sometimes|string|max:255|unique:students,nis,' . $this->student->id,
                    'status_pkl' => 'sometimes|string|in:Aktif, Tidak Aktif',
                ];
            }

            return [
                'name' => 'required|string|max:255',
                'gender' => 'required|string|in:L,P',
                'address' => 'required|string|max:255',
                'contact' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:students,email',
                'nis' => 'required|string|max:255|unique:students,nis',
                'status_pkl' => 'required|string|in:Aktif, Tidak Aktif',
            ];
        }
}
