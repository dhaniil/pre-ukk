<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustriesResource\Pages;
use App\Filament\Resources\IndustriesResource\RelationManagers;
use App\Models\Industries;
use Dom\Text;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;

class IndustriesResource extends Resource
{
    protected static ?string $model = Industries::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Industries Details')
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1),
                        Forms\Components\TextInput::make('bidang_usaha')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1),
                        Forms\Components\Select::make('guru_pembimbing')
                        ->required()
                        ->relationship('teacher', 'name')
                        ->columnSpan(2),
                    ])
                ]),
                Forms\Components\Section::make('Industries Informations')
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
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Nama')
                ->searchable(),
                Tables\Columns\TextColumn::make('bidang_usaha')
                ->searchable(),
                TextColumn::make('teacher.name')
                ->searchable(),
                TextColumn::make('internships_count')
                ->label('Internships')
                ->badge()
                ->counts('internships')
                ->color('primary')
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make()
                    ->before(function (DeleteAction $action, Industries $record) {
                        if($record->internships()->exists()) {
                            Notification::make()
                                ->title("Industri {$record->name} tidak bisa dihapus")
                                ->body('Industri ini memiliki data PKL yang terkait.')
                                ->danger()
                                ->send();
                            $action->cancel();
                            return false;
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function (\Illuminate\Support\Collection $records) {
                            $industriesWithInternships = [];
                            $industriesToDelete = [];
                            
                            foreach ($records as $record) {
                                if ($record->internships()->exists()) {
                                    $industriesWithInternships[] = $record->name;
                                } else {
                                    $industriesToDelete[] = $record->id;
                                }
                            }
                            
                            if (count($industriesWithInternships) > 0) {
                                Notification::make()
                                    ->danger()
                                    ->title('Beberapa industri tidak bisa dihapus')
                                    ->body('Industri berikut memiliki data PKL terkait: ' . implode(', ', $industriesWithInternships))
                                    ->send();
                            }
                            
                            if (count($industriesToDelete) > 0) {
                                Industries::whereIn('id', $industriesToDelete)->delete();
                                
                                Notification::make()
                                    ->success()
                                    ->title('Industri berhasil dihapus')
                                    ->body(count($industriesToDelete) . ' industri telah dihapus.')
                                    ->send();
                            }
                            
                            return true;
                        }),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListIndustries::route('/'),
            'create' => Pages\CreateIndustries::route('/create'),
            'edit' => Pages\EditIndustries::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
