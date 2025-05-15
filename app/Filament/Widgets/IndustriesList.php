<?php

namespace App\Filament\Widgets;

use App\Models\Industries;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class IndustriesList extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Industries::query()->with('teacher');
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Nama Industri')
                ->searchable()
                ->sortable(),
            TextColumn::make('bidang_usaha')
                ->label('Bidang Usaha')
                ->searchable()
                ->sortable(),
            TextColumn::make('address')
                ->label('Alamat')
                ->searchable(),
            TextColumn::make('contact')
                ->label('Kontak')
                ->searchable(),
            TextColumn::make('teacher.name')
                ->label('Guru Pembimbing')
                ->searchable()
                ->sortable(),
        ];
    }
}
