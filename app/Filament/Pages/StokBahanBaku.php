<?php

namespace App\Filament\Pages;

use App\Models\OrderItem;
use App\Models\Produk;
use Filament\Pages\Page;

class StokBahanBaku extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Bahan Baku';
    protected static ?string $navigationLabel = 'Stok Bahan Baku';
    protected static ?string $title = 'Stok Bahan Baku';
    protected static string $view = 'filament.pages.stok-bahan-baku';

    public $produks;

    public function mount()
    {
        $this->produks = Produk::withSum('orderItem', 'kuantitas')
            ->with('bahanBakus')
            ->get();
    }
}
