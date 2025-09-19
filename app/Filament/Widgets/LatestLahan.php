<?php

namespace App\Filament\Widgets;

use App\Models\Produk;
use App\Models\Review;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestLahan extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    protected static bool $isLazy = false;
    protected static ?string $heading = 'Data Ulasan Terbaru';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Review::query()
                    ->latest()
            )
            ->defaultPaginationPageOption(5)
            ->paginated(5)
            ->columns([
                Tables\Columns\TextColumn::make('produk.name')->label('Nama Produk'),
                // Tables\Columns\TextColumn::make('luas_lahan')->label('Luas Produk (ha)'),
                Tables\Columns\TextColumn::make('nama_pembeli')->label('Nama Pembeli'),
                Tables\Columns\TextColumn::make('rating')->label('Rating'),
                Tables\Columns\TextColumn::make('comment')->label('Comment'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y'),
            ]);
    }
}
