<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderItemsResource\Pages;
use App\Filament\Resources\OrderItemsResource\RelationManagers;
use App\Helpers\EnumStatusHelper;
use App\Models\OrderItem;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderItemsResource extends Resource
{
    protected static ?string $model = OrderItem::class;
    protected static ?string $navigationGroup = 'Pesanan';
    protected static bool $isLazy = false;
    protected static ?string $modelLabel = 'Entri Pesanan'; // Label untuk satu item
    protected static ?string $pluralModelLabel = 'Daftar Entri Pesanan'; // Label untuk daftar item
    protected static ?string $navigationLabel = 'Entri Pesanan'; // Label di sidebar
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('produk_id')
                    ->label('Pilih Produk')
                    ->required()
                    ->relationship('produk', 'name'),
                TextInput::make('kuantitas')
                    ->label('Jumlah')
                    ->numeric()
                    ->required()
                    ->minValue(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_id')
                    ->label('ID Pesanan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('produk.name')
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('kuantitas')
                    ->label('Jumlah')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('harga_satuan')
                    ->label('Harga Satuan')
                    ->sortable()
                    ->searchable()
                    ->money('IDR')
                    ->getStateUsing(function (OrderItem $record) {
                        if (!$record->produk) return 0;

                        $harga = $record->produk->harga;
                        $diskon = $record->produk->diskon ?? 0;

                        return $harga - ($harga * $diskon / 100);
                    }),

                TextColumn::make('harga_subtotal')
                    ->label('Harga Subtotal')
                    ->sortable()
                    ->searchable()
                    ->money('IDR')
                    ->getStateUsing(function (OrderItem $record) {
                        if (!$record->produk) return 0;

                        $harga = $record->produk->harga;
                        $diskon = $record->produk->diskon ?? 0;
                        $hargaDiskon = $harga - ($harga * $diskon / 100);

                        return $hargaDiskon * $record->kuantitas;
                    }),
                TextColumn::make('order.status')
                    ->label("Status")
                    ->badge()
                    ->colors([
                        'warning' => 'menunggu konfirmasi',
                        'success' => 'dalam proses',
                        'emerald' => 'selesai',
                        'danger'  => 'dibatalkan',
                    ])
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListOrderItems::route('/'),
            'create' => Pages\CreateOrderItems::route('/create'),
            'edit' => Pages\EditOrderItems::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // tombol New / Create tidak akan muncul
    }
}
