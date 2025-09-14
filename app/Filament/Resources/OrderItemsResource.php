<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderItemsResource\Pages;
use App\Filament\Resources\OrderItemsResource\RelationManagers;
use App\Helpers\EnumStatusHelper;
use App\Models\OrderItem;
use Filament\Forms;
use Filament\Forms\Components\Select;
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
                //
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
                TextColumn::make('order.status')
                    ->label('Status Pesanan')
                    ->badge()
                    ->colors([
                        'warning' => 'menunggu konfirmasi',
                        'success' => 'dikonfirmasi',
                        'info'    => 'dalam proses',
                        'primary' => 'pengemasan',
                        'purple'  => 'pengiriman',
                        'emerald' => 'selesai',
                        'danger'  => 'dibatalkan',
                    ])
                    ->sortable()
                    ->searchable(),
                SelectColumn::make('status_proses')
                    ->label("Status Proses")
                    ->options(EnumStatusHelper::getEnumValues('order_items', 'status_proses'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tanggal_mulai')
                    ->label('Tanggal Mulai Produksi')
                    ->formatStateUsing(function ($state) {
                        return $state === '0000-00-00' ? '0000-00-00' : $state;
                    })
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
}
