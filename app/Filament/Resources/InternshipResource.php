<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InternshipResource\Pages;
use App\Filament\Resources\InternshipResource\RelationManagers;
use App\Models\Internship;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Field;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InternshipResource extends Resource
{
    protected static ?string $model = Internship::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Internship Details')
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('industries_id')
                        ->relationship('industries', 'name')
                        ->columnSpan(2),
                        Forms\Components\Select::make('teacher_id')
                        ->relationship('teacher', 'name')
                        ->columnSpan(1),
                        Forms\Components\Select::make('student_id')
                        ->relationship('student', 'name')
                    ])
                ]),
                Forms\Components\Section::make('Internship Period')
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        DatePicker::make('mulai')
                        ->label('Mulai')
                        ->required()
                            ->live()
                        ->columnSpan(1),
                        DatePicker::make('selesai')
                        ->label('Selesai')
                        ->required()
                            ->minDate(fn (Forms\Get $get) => $get('mulai'))
                        ->columnSpan(1),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('industries.name')
                ->label('Industries')
                ->searchable(),
                TextColumn::make('teacher.name')
                ->label('Guru Pembimbing')
                ->searchable(),
                TextColumn::make('student.name')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInternships::route('/'),
            'create' => Pages\CreateInternship::route('/create'),
            'edit' => Pages\EditInternship::route('/{record}/edit'),
        ];
    }
}
