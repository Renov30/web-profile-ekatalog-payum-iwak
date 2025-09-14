<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Helpers\EnumStatusHelper;
use App\Models\Order;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationGroup = 'Pesanan';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $isLazy = false;
    protected static ?string $modelLabel = 'Pesanan'; // Label untuk satu item
    protected static ?string $pluralModelLabel = 'Daftar Pesanan'; // Label untuk daftar item
    protected static ?string $navigationLabel = 'Pesanan'; // Label di sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Pembeli')
                    ->required()
                    ->maxLength(255),
                TextInput::make('no_hp')
                    ->label('No Handphone')
                    ->required()
                    ->maxLength(255),
                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->rows(5),
                Select::make('status')
                    ->label('Status')
                    ->options(EnumStatusHelper::getEnumValues('orders', 'status'))
                    ->required(),
                Repeater::make('orderItem') // relasi order -> orderItem
                    ->label('Daftar Produk')
                    ->relationship() // otomatis simpan ke relasi
                    ->columnSpanFull()
                    ->schema([
                        Select::make('produk_id')
                            ->label('Produk')
                            ->options(Produk::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        TextInput::make('kuantitas')
                            ->label('Kuantitas')
                            ->numeric()
                            ->minValue(1)
                            ->required(),

                        // Select::make('status_proses')
                        //     ->label('Status Proses')
                        //     ->options(EnumStatusHelper::getEnumValues('order_items', 'status_proses'))
                        //     ->default(fn() => collect(EnumStatusHelper::getEnumValues('order_items', 'status_proses'))->keys()->first()) // ambil nilai pertama
                        //     ->required(),
                    ])
                    ->columns(2) // biar lebih rapih
                    ->createItemButtonLabel('Tambah Produk'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label("ID Pesanan")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label("Nama Pembeli")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('no_hp')
                    ->label("No Handphone")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->label("Alamat")
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->limit(50)
                    ->tooltip(fn($state) => strip_tags($state))
                    ->searchable()
                    ->sortable(),
                // Kolom produk + kuantitas
                TextColumn::make('produk_list')
                    ->label('Produk')
                    ->getStateUsing(function ($record) {
                        return $record->orderItem
                            ->map(fn($item) => $item->produk?->name . ' (x' . $item->kuantitas . ')')
                            ->filter() // buang null kalau ada
                            ->toArray(); // harus array untuk badge
                    })
                    ->badge()
                    ->color('info'),
                TextColumn::make('subtotal')
                    ->label('Total Harga')
                    ->getStateUsing(function ($record) {
                        return $record->orderItem->sum(function ($item) {
                            $produk = $item->produk;
                            if (!$produk) {
                                return 0;
                            }

                            $harga = $produk->diskon
                                ? $produk->harga - ($produk->harga * $produk->diskon / 100)
                                : $produk->harga;

                            return $harga * $item->kuantitas;
                        });
                    })
                    ->money('IDR') // biar diformat uang otomatis
                    ->sortable(),

                SelectColumn::make('status')
                    ->label("Status")
                    ->options(EnumStatusHelper::getEnumValues('orders', 'status'))
                    ->sortable()
                    ->searchable()
                    ->afterStateUpdated(function ($state, $record) {
                        if ($state === 'dalam proses') {
                            $record->orderItem()->update([
                                'tanggal_mulai' => now(),
                                'status_proses' => 'pengumpulan bahan & pengupasan',
                            ]);
                        }
                    }),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
