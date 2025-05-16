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
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
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

public static function infolist(Infolist $infolist): Infolist
{
    return $infolist
        ->schema([
            // Personal Information Section
            \Filament\Infolists\Components\Section::make('Student Details')
                ->schema([
                    \Filament\Infolists\Components\Grid::make(2)
                        ->schema([
                            TextEntry::make('name')
                                ->label('Name')
                                ->weight('bold')
                                ->size('lg'),
                            TextEntry::make('nis')
                                ->label('NIS (Nomor Induk Siswa)')
                                ->badge(),
                            TextEntry::make('gender')
                                ->label('Jenis Kelamin')
                                ->badge()
                                ->formatStateUsing(fn (string $state): string => $state === 'L' ? 'Laki-laki' : 'Perempuan')
                                ->color(fn (string $state): string => $state === 'L' ? 'primary' : 'danger'),
                            TextEntry::make('status_pkl')
                                ->label('Status PKL')
                                ->badge()
                                ->color(fn (string $state): string => $state === 'Aktif' ? 'success' : 'warning'),
                        ]),
                ]),

            \Filament\Infolists\Components\Section::make('Contact Information')
                ->schema([
                    \Filament\Infolists\Components\Grid::make(2)
                        ->schema([
                            TextEntry::make('address')
                                ->label('Address')
                                ->columnSpan(2),
                            TextEntry::make('contact')
                                ->label('Phone Number')
                                ->icon('heroicon-o-phone'),
                            TextEntry::make('email')
                                ->label('Email')
                                ->icon('heroicon-o-envelope')
                                ->url(fn (string $state): string => "mailto:{$state}"),
                        ]),
                ]),
                
            // System Information Section (optional)
            \Filament\Infolists\Components\Section::make('System Information')
                ->collapsed()
                ->schema([
                    \Filament\Infolists\Components\Grid::make(2)
                        ->schema([
                            TextEntry::make('created_at')
                                ->label('Created At')
                                ->dateTime(),
                            TextEntry::make('updated_at')
                                ->label('Last Updated')
                                ->dateTime(),
                        ]),
                ]),
        ]);
}
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
                TextColumn::make('status_pkl'),

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
