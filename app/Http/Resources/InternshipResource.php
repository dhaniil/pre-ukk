<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InternshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama_siswa' => $this->student->name ?? null,
            'indsutri' => $this->industries->name ?? null,
            'guru_pembimbing' => $this->teacher->name ?? null,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
        ];
    }
}
