<?php

namespace App\Filament\Widgets;

use App\Models\Distrik;
use App\Models\Galeri;
use App\Models\Lahan;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;
    public function getColumn(): int
    {
        return 2;
    }
    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        $distrik = Distrik::count();
        $lahan = Lahan::count();
        $jumlahLuas = Lahan::sum('luas_lahan');
        return [
            //
            Stat::make('Jumlah distrik', $distrik . ' Distrik')
                ->description('Data distrik yang didapatkan')
                ->Icon('heroicon-o-map'),
            Stat::make('Jumlah lahan', $lahan . ' Lahan')
                ->description('Data lahan berdasarkan distrik')
                ->Icon('heroicon-o-map-pin'),
            Stat::make('Total Luas Lahan', $jumlahLuas . ' hektar')
                ->description('Total luas seluruh lahan di Merauke')
                ->Icon('heroicon-o-information-circle'),
        ];
    }
}
