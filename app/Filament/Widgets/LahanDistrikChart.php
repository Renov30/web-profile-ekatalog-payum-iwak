<?php

namespace App\Filament\Widgets;

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
    protected static ?string $heading = 'Jumlah Produk Per Kategori Produk';

    protected function getData(): array
    {
        $data = Produk::selectRaw('kategori_id, COUNT(*) as total')
            ->groupBy('kategori_id')
            ->with('kategoriproduk')
            ->get();
        return [
            'labels' => $data->pluck('kategoriproduk.name')->toArray(),
            'datasets' => [
                [
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => ['#ff6384', '#36a2eb', '#ffcd56'],
                ],
            ],
            // 'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
