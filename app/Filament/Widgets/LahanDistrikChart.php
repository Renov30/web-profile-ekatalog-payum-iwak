<?php

namespace App\Filament\Widgets;

use App\Models\Lahan;
use Filament\Widgets\ChartWidget;

class LahanDistrikChart extends ChartWidget
{
    protected static ?int $sort = 1;
    public function getColumns(): int
    {
        return 1;
    }

    protected static bool $isLazy = false;
    protected static ?string $heading = 'Jumlah Lahan Per Distrik';

    protected function getData(): array
    {
        $data = Lahan::selectRaw('distrik_id, COUNT(*) as total')
            ->groupBy('distrik_id')
            ->with('distrik')
            ->get();
        return [
            'labels' => $data->pluck('distrik.name')->toArray(),
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
