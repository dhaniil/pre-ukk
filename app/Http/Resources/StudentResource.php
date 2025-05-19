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
            'email' => $this->email,
            'gender' => $this->gender,
            'contact' => $this->contact,
            'nis' => $this->nis,
            'address' => $this->address,
            'status_pkl' => $this->status_pkl,
            'industri' => $this->industry->name,
        ];
    }
}
