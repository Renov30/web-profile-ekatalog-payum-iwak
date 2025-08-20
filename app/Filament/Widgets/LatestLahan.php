<?php

namespace App\Filament\Widgets;

use App\Models\Lahan;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestLahan extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    protected static bool $isLazy = false;
    protected static ?string $heading = 'Data Lahan Terbaru';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Lahan::query()
                    ->latest()
            )
            ->defaultPaginationPageOption(5)
            ->paginated(5)
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama Pemilik'),
                Tables\Columns\TextColumn::make('luas_lahan')->label('Luas Lahan (ha)'),
                Tables\Columns\TextColumn::make('distrik.name')->label('Distrik'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y'),
            ]);
    }
}
