<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LahanResource\Pages;
use App\Filament\Resources\LahanResource\RelationManagers;
use App\Models\Lahan;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class LahanResource extends Resource
{
    protected static ?string $model = Lahan::class;

    protected static bool $isLazy = false;

    protected static ?string $modelLabel = 'Lahan'; // Label untuk satu item
    protected static ?string $pluralModelLabel = 'Daftar Lahan'; // Label untuk daftar item
    protected static ?string $navigationLabel = 'Lahan'; // Label di sidebar

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->label('Nama Lahan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nama_petani')
                    ->label('Nama Petani')
                    ->required()
                    ->maxLength(255),
                TextInput::make('luas_lahan')
                    ->required()
                    ->maxLength(255)
                    ->suffix('hektar'),
                Select::make('distrik_id')
                    ->label('Distrik')
                    ->required()
                    ->relationship('distrik', 'name'),
                TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                TextInput::make('no_hp')
                    ->label('No. Hp')
                    ->required()
                    ->maxLength(255),
                TextInput::make('longitude')
                    ->required()
                    ->maxLength(255),
                TextInput::make('latitude')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('thumbnail')
                    ->required()
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->label('Nama Lahan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nama_petani')
                    ->label('Nama Petani')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('luas_lahan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('distrik.name')
                    ->label('Distrik')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('no_hp')
                    ->label('No. Hp')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('longitude')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('latitude')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    ExportBulkAction::make()
                        ->label('Ekspor Data'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\GaleriRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLahans::route('/'),
            'create' => Pages\CreateLahan::route('/create'),
            'edit' => Pages\EditLahan::route('/{record}/edit'),
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
