<?php

namespace App\Filament\Widgets;

use App\Models\KategoriProduk;
use App\Models\Galeri;
use App\Models\Produk;
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
        $kategoriproduk = KategoriProduk::count();
        $produk = Produk::count();
        // $jumlahLuas = Produk::sum('luas_lahan');
        return [

            Stat::make('Jumlah kategori produk', $kategoriproduk . ' Kategori')
                ->description('Data kategori produk yang didapatkan')
                ->Icon('heroicon-o-map'),
            Stat::make('Jumlah produk', $produk . ' Produk')
                ->description('Data produk berdasarkan kategori produk')
                ->Icon('heroicon-o-map-pin'),
            // Stat::make('Total Luas Produk', $jumlahLuas . ' hektar')
            //     ->description('Total luas seluruh produk di Merauke')
            //     ->Icon('heroicon-o-information-circle'),
        ];
    }
}
