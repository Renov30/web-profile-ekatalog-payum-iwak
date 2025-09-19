<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Produk;
use Filament\Widgets\ChartWidget;

class LahanKategoriProdukChart extends ChartWidget
{
    protected static ?int $sort = 1;
    public function getColumns(): int
    {
        return 1;
    }

    protected static bool $isLazy = false;
    protected static ?string $heading = 'Jumlah Pesanan Masuk';

    protected function getData(): array
    {

        $totalOrders = Order::count();

        return [
            'labels' => ['Total Pesanan'],
            'datasets' => [
                [
                    'data' => [$totalOrders],
                    'backgroundColor' => ['#36a2eb'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
