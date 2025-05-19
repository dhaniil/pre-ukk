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
        return ture;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if($this->isMethod('POST')) {
            return [
                'name' => 'required',
                'address' => 'required|string|max:255',
                'email' => 'required|email',
                'gender' => 'required|in:L,P',
                'contact' => 'required|string',
                'nis' => 'required|string',
                'status_pkl' => 'required|in:Aktif,Tidak Aktif',
            ];
        }

        if($this->isMethod('PATCH') || $this->isMethod('PUT')) {
            return [
                'name' => 'sometimes|string|max:255',
                'address' => 'sometimes|string|max:255',
                'email' => 'sometimes|required|email',
                'gender' => 'sometimes|required|in:L,P',
                'contact' => 'sometimes|required|string',
                'nis' => 'sometimes|required|string',
                'status_pkl' => 'sometimes|required|in:Aktif,Tidak Aktif',
            ];
        }

        return [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'nis' => 'required|string|max:255',
            'status_pkl' => 'required|string|in:Aktif,Tidak Aktif',
        ];
    }
}
