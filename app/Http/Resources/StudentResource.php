<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'gender' => $this->gender,
            'address' => $this->address,
            'contact' => $this->contact,
            'email' => $this->email,
            'nis' => $this->nis,
            'status_pkl' => $this->status_pkl,
            'internship' => $this->industry ? $this->industry->name : null,
        ];
    }
}
