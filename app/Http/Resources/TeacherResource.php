<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'nip' => $this->nip,
            'email' => $this->email,
            'gender' => $this->gender,
            'address' => $this->address,
            'contact' => $this->contact,
            'industri' => $this->industries->pluck('name'),

        ];
    }
}
