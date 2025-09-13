<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriProdukResource\Pages;
use App\Filament\Resources\KategoriProdukResource\RelationManagers;
use App\Models\KategoriProduk;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriProdukResource extends Resource
{
    protected static ?string $model = KategoriProduk::class;

    protected static bool $isLazy = false;

    protected static ?string $modelLabel = 'Kategori Produk'; // Label untuk satu item
    protected static ?string $pluralModelLabel = 'Daftar Kategori Produk'; // Label untuk daftar item
    protected static ?string $navigationLabel = 'Kategori'; // Label di sidebar

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->label('Nama Kategori Produk')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(5),
                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->required()
                    ->default(true), // default aktif
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->label('Nama Kategori Produk')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Deskripsi Kategori Produk')
                    ->limit(50) // hanya tampilkan 50 karakter
                    ->tooltip(fn($record) => $record->description) // tampil full saat hover
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListKategoriProduks::route('/'),
            'create' => Pages\CreateKategoriProduk::route('/create'),
            'edit' => Pages\EditKategoriProduk::route('/{record}/edit'),
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
