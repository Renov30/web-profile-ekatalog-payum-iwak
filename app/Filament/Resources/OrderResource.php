<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Helpers\EnumStatusHelper;
use App\Models\Order;
use Filament\Forms;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $isLazy = false;

    protected static ?string $modelLabel = 'Orders'; // Label untuk satu item
    protected static ?string $pluralModelLabel = 'Daftar Pesanan'; // Label untuk daftar item
    protected static ?string $navigationLabel = 'Orders'; // Label di sidebar

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
                TextInput::make('total_harga')
                    ->label('Total Harga')
                    ->numeric()
                    ->required()
                    ->prefix('Rp'),
                Select::make('status')
                    ->label('Status')
                    ->options(EnumStatusHelper::getEnumValues('orders', 'status'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                TextColumn::make('total_harga')
                    ->label("Total Harga")
                    ->searchable()
                    ->sortable(),
                SelectColumn::make('status')
                    ->label("Status")
                    ->options(EnumStatusHelper::getEnumValues('orders', 'status'))
                    ->sortable()
                    ->searchable(),
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
