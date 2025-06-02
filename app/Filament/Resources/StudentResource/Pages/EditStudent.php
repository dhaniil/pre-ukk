<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudent extends EditRecord
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        $email = $this->record->email;

        return [
            Actions\DeleteAction::make()
                ->visible(function () {
                    return !$this->record->internships()->exists();
                }),
        ];
    }
}
