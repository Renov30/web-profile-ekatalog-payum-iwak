<?php

namespace App\Filament\Widgets;

use App\Models\Produk;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestLahan extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    protected static bool $isLazy = false;
    protected static ?string $heading = 'Data Produk Terbaru';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Produk::query()
                    ->latest()
            )
            ->defaultPaginationPageOption(5)
            ->paginated(5)
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama Produk'),
                // Tables\Columns\TextColumn::make('luas_lahan')->label('Luas Produk (ha)'),
                Tables\Columns\TextColumn::make('kategoriproduk.name')->label('Kategori Produk'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y'),
            ]);
    }
}
