<?php

namespace App\Filament\Resources\ProdukBahanBakuResource\Pages;

use App\Filament\Resources\ProdukBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdukBahanBakus extends ListRecords
{
    protected static string $resource = ProdukBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
