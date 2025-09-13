<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static bool $isLazy = false;

    protected static ?string $modelLabel = 'Produk'; // Label untuk satu item
    protected static ?string $pluralModelLabel = 'Daftar Produk'; // Label untuk daftar item
    protected static ?string $navigationLabel = 'Produk'; // Label di sidebar

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('kategori_id')
                    ->label('KategoriProduk')
                    ->required()
                    ->relationship('kategoriproduk', 'name'),
                TextInput::make('name')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(255),
                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->required()
                    ->prefix('Rp'),
                TextInput::make('diskon')
                    ->label('Diskon')
                    ->numeric()
                    ->required()
                    ->postfix('%'),
                RichEditor::make('description')
                    ->label('Deskripsi Produk')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('bahan_utama')
                    ->label('Bahan Utama')
                    ->columnSpanFull(),
                RichEditor::make('manfaat')
                    ->label('Manfaat Produk')
                    ->columnSpanFull(),
                RichEditor::make('spesifikasi')
                    ->label('Spesifikasi Produk')
                    ->columnSpanFull(),
                RichEditor::make('keunggulan')
                    ->label('Keunggulan Produk')
                    ->columnSpanFull(),
                RichEditor::make('penggunaan')
                    ->label('Cara Penggunaan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kategoriproduk.name')
                    ->label('Kategori Produk')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('harga')
                    ->label('Harga Produk')
                    ->money('IDR', true)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('diskon')
                    ->label('Diskon Harga')
                    ->formatStateUsing(fn($state) => $state . ' %') // tampil "10 %"
                    ->searchable()
                    ->sortable(),
                TextColumn::make('final_price')
                    ->label('Harga Setelah Diskon')
                    ->getStateUsing(fn($record) => $record->harga - ($record->harga * $record->diskon / 100))
                    ->money('IDR', true),
                TextColumn::make('description')
                    ->label('Deskripsi Produk')
                    ->getStateUsing(fn($record) => strip_tags($record->description))
                    ->limit(50)
                    ->tooltip(fn($record) => strip_tags($record->description))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('bahan_utama')
                    ->label('Bahan Utama')
                    ->getStateUsing(fn($record) => strip_tags($record->bahan_utama))
                    ->limit(50)
                    ->tooltip(fn($record) => strip_tags($record->bahan_utama))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('manfaat')
                    ->label('Manfaat Produk')
                    ->getStateUsing(fn($record) => strip_tags($record->manfaat))
                    ->limit(50)
                    ->tooltip(fn($record) => strip_tags($record->manfaat))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('spesifikasi')
                    ->label('Spesifikasi Produk')
                    ->getStateUsing(fn($record) => strip_tags($record->spesifikasi))
                    ->limit(50)
                    ->tooltip(fn($record) => strip_tags($record->spesifikasi))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('keunggulan')
                    ->label('Keunggulan Produk')
                    ->getStateUsing(fn($record) => strip_tags($record->keunggulan))
                    ->limit(50)
                    ->tooltip(fn($record) => strip_tags($record->keunggulan))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('penggunaan')
                    ->label('Cara Penggunaan')
                    ->getStateUsing(fn($record) => strip_tags($record->penggunaan))
                    ->limit(50)
                    ->tooltip(fn($record) => strip_tags($record->penggunaan))
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
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
