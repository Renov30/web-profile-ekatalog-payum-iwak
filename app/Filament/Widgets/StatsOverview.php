<?php

namespace App\Filament\Widgets;

use App\Models\KategoriProduk;
use App\Models\Galeri;
use App\Models\Order;
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
        $pesanan = Order::count();
        $pesananMenunggu = Order::where('status', 'menunggu konfirmasi')->count();
        $pesananProses = Order::where('status', 'dalam proses')->count();

        return [

            Stat::make('Total Pesanan', $pesanan . ' Pesanan')
                ->description('Data jumlah pesanan keseluruhan')
                ->Icon('heroicon-o-information-circle'),
            Stat::make('Pesanan Menunggu', $pesananMenunggu . ' Pesanan')
                ->description('Data jumlah pesanan belum dikonfirmasi')
                ->Icon('heroicon-o-information-circle'),
            Stat::make('Pesanan Dikonfirmasi', $pesananProses . ' Pesanan')
                ->description('Data jumlah pesanan sudah dikonfirmasi')
                ->Icon('heroicon-o-information-circle'),
        ];
    }
}
