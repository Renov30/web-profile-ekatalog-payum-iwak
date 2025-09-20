<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderProductionResource\Pages;
use App\Filament\Resources\OrderProductionResource\RelationManagers;
use App\Models\OrderProduction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderProductionResource extends Resource
{
    protected static ?string $model = OrderProduction::class;
    protected static ?string $navigationGroup = 'Pesanan';
    protected static ?string $navigationLabel = 'Daftar Produksi'; // Label di sidebar
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_order')
                    ->label('Pilih Pesanan')
                    ->required()
                    ->relationship('order', 'id'),
                Select::make('id_stage')
                    ->label('Pilih Tahapan Produksi')
                    ->required()
                    ->relationship('stage', 'name'),
                DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai Produksi')
                    ->default(now())
                    ->required(),
                TextInput::make('waktu_total_produksi')
                    ->label('Waktu Total Produksi (hari)')
                    ->required()
                    ->postfix('hari')
                    ->integer() // membatasi input hanya integer
                    ->minValue(1) // optional, jika mau minimal 1
                    ->maxValue(1000), // optional, jika mau batas maksimum
                TextInput::make('persentase_progress')
                    ->label('Persentase Progress (%)')
                    ->required()
                    ->numeric()
                    ->minValue(0) // optional, jika mau minimal 0%
                    ->maxValue(100), // optional, jika mau maksimal 100%
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_order')
                    ->label('ID Pesanan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('order.name')
                    ->label('Nama Pemesan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('order.orderItem')
                    ->label('Produk Dipesan')
                    ->getStateUsing(function ($record) {
                        return $record->order?->orderItem
                            ->map(fn($item) => $item->produk?->name . ' (x' . $item->kuantitas . ')')
                            ->filter() // buang null kalau ada
                            ->toArray(); // harus array untuk badge
                    })
                    ->badge()
                    ->color('info'),
                // TextColumn::make('stage.name') // pakai relasi
                //     ->label('Tahapan Produksi')
                //     ->badge()
                //     ->colors([
                //         'success' => 'Pengumpulan Bahan',
                //         'warning' => 'Pengolahan Bahan Baku',
                //         'info' => 'Pengendapan Bahan Baku',
                //         'emerald'  => 'Pemurnian dan Pengemasan',
                //     ])
                //     ->searchable()
                //     ->sortable(),
                TextColumn::make('progress.stage')
                    ->label('Tahap Sekarang')
                    ->badge()
                    ->color('warning')
                    ->sortable(),

                TextColumn::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('progress.hari_berjalan')
                    ->label('Hari Berjalan')
                    ->formatStateUsing(fn($state) => $state . ' hari'),

                TextColumn::make('waktu_total_produksi')
                    ->label('Waktu Total')
                    ->formatStateUsing(fn($state) => $state . ' hari')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('progress.persentase_progress')
                    ->label('Progress (%)')
                    ->formatStateUsing(fn($state) => $state . ' %')
                    ->sortable(),
                // TextColumn::make('persentase_progress')
                //     ->label('Progress (%)')
                //     ->formatStateUsing(fn($state) => $state . ' %')
                //     ->searchable()
                //     ->sortable(),

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
            'index' => Pages\ListOrderProductions::route('/'),
            'create' => Pages\CreateOrderProduction::route('/create'),
            'edit' => Pages\EditOrderProduction::route('/{record}/edit'),
        ];
    }
}
