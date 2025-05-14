<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Student Details')
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1),
                        Forms\Components\TextInput::make('nis')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1)
                        ->label('NIS (Nomor Induk Siswa)')
                        ->unique(ignoreRecord: true),
                        Forms\Components\Select::make('gender')
                        ->required()
                        ->options([
                            'L' => 'Laki-laki',
                            'P' => 'Perempuan',

                        ])
                        ->columnSpan(1),
                        Forms\Components\Select::make('status_pkl')
                            ->options([
                                'Aktif' => 'Aktif',
                                'Tidak Aktif' => 'Tidak Aktif',
                            ])
                            ->visibleOn('view')

                            ->dehydrated(fn ($state) => filled($state))
                    ])
                ]),
                Forms\Components\Section::make('Student Informations')
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('address')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2),
                        Forms\Components\TextInput::make('contact')
                        ->columnSpan(1),
                        Forms\Components\TextInput::make('email')
                        ->columnSpan(1),
                    ])
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading("Tidak ada data Siswa")
            ->filtersLayout(FiltersLayout::AboveContentCollapsible)
            ->searchDebounce(1)
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('nis')
                ->searchable(),
                TextColumn::make('gender')
                ->label('Jenis Kelamin')
                ->badge()
                ->color(static function ($state) {
                    if($state == 'L') {
                        return 'primary';
                    } else {
                        return 'danger';
                    }
                }),
                TextColumn::make('status_pkl')

            ])
            ->filters([
                SelectFilter::make('status_pkl')
                ->options([
                    'Aktif' => 'Aktif',
                    'Tidak Aktif' => 'Tidak Aktif',
                ]),
                TrashedFilter::make()
            ])

            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),


            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                DeleteBulkAction::make(),
                RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
