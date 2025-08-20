<?php

namespace App\Filament\Widgets;

use App\Models\Lahan;
use Filament\Widgets\ChartWidget;

class JumlahProduksiChart extends ChartWidget
{
    protected static ?int $sort = 2;
    public function getColumns(): int
    {
        return 2;
    }

    protected static bool $isLazy = false;
    protected static ?string $heading = 'Total Produksi Per Distrik (ton)';

    protected function getData(): array
    {
        $data = Lahan::join('produksis', 'lahans.id', '=', 'produksis.lahan_id')
            ->select('lahans.distrik_id')
            ->selectRaw('SUM(produksis.hasil_produksi) as total_produksi')
            ->groupBy('lahans.distrik_id')
            ->with('distrik')
            ->get();

        return [
            'labels' => $data->pluck('distrik.name')->toArray(),
            'datasets' => [
                [
                    'data' => $data->pluck('total_produksi')->toArray(),
                    'backgroundColor' => ['#ff6384', '#36a2eb', '#ffcd56'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
