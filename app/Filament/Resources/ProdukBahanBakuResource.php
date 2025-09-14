<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukBahanBakuResource\Pages;
use App\Filament\Resources\ProdukBahanBakuResource\RelationManagers;
use App\Models\ProdukBahanBaku;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdukBahanBakuResource extends Resource
{
    protected static ?string $model = ProdukBahanBaku::class;
    protected static ?string $navigationGroup = 'Bahan Baku';
    protected static ?string $tittle = 'Bahan Baku per Produk';
    protected static ?string $pluralModelLabel = 'Daftar Bahan Baku per Produk';
    protected static ?string $navigationLabel = 'Bahan Baku per Produk';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('produk_id')
                    ->label('Produk')
                    ->required()
                    ->relationship('produk', 'name'),
                Select::make('bahan_baku_id')
                    ->label('Bahan Baku')
                    ->required()
                    ->relationship('bahanBaku', 'name'),
                TextInput::make('kuantitas_per_unit')
                    ->label('Kuantitas per Unit')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('produk.name')
                    ->label("Produk")
                    ->searchable()
                    ->sortable(),
                // Kolom produk + kuantitas
                TextColumn::make('bahanBaku.name')
                    ->label("Bahan Baku")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kuantitas_per_unit')
                    ->label("Jumlah per Unit")
                    ->formatStateUsing(fn($state) => rtrim(rtrim(number_format($state, 2, '.', ''), '0'), '.'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProdukBahanBakus::route('/'),
            'create' => Pages\CreateProdukBahanBaku::route('/create'),
            'edit' => Pages\EditProdukBahanBaku::route('/{record}/edit'),
        ];
    }
}
