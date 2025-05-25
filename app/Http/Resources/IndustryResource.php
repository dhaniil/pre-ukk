<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndustryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=> $this->name,
            'bidang_usaha' => $this->bidang_usaha,
            'address' => $this->address,
            'contact' => $this->contact,
            'email' => $this->email,
            'guru_pembimbing' => $this->teacher->name
        ];
    }
}
