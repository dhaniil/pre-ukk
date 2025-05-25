<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            // Get the teacher ID from the route
            $teacherId = $this->route('teacher')->id ?? $this->route('id');

            return [
                'name' => 'sometimes|string|max:255',
                'nip' => 'sometimes|string|max:255|unique:teachers,nip,' . $teacherId,
                'gender' => 'sometimes|string|in:P,L',
                'address' => 'sometimes|string|max:255',
                'contact' => 'sometimes|string|max:255',
                'email' => 'sometimes|string|email|max:255|unique:teachers,email,' . $teacherId,
            ];
        }

        return [
            'name' => 'required|string|max:255',
            'nip' => 'required|string|unique:teachers,nip|max:255',
            'gender' => 'required|string|in:P,L',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers,email',
        ];
    }
}
