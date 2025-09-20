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

    public $produksSemua;
    public $produksDalamProses;

    public function mount()
    {
        $this->produksSemua = Produk::withSum('orderItem', 'kuantitas')
            ->with('bahanBakus')
            ->get();

        $this->produksDalamProses = Produk::whereHas('orderItem.order', function ($q) {
            $q->where('status', 'dalam proses');
        })
            ->withSum(['orderItem as order_item_sum_kuantitas' => function ($q) {
                $q->whereHas('order', function ($q2) {
                    $q2->where('status', 'dalam proses');
                });
            }], 'kuantitas')
            ->with(['bahanBakus'])
            ->get();
    }
}
