<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternshipRequest extends FormRequest
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
                'student_id' => 'sometimes|exists:students,id',
                'industries_id' => 'sometimes|exists:industries,id',
                'teacher_id' => 'sometimes|exists:teachers,id',
                'mulai' => 'sometimes|date',
                'selesai' => 'sometimes|date|after_or_equal:mulai',
            ];
        }
        return [
            'student_id' => 'required|exists:students,id',
            'industries_id' => 'required|exists:industries,id',
            'teacher_id' => 'required|exists:teachers,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ];
    }
}
