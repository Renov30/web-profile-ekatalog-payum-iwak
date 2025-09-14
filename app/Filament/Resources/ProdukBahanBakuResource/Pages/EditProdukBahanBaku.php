<?php

namespace App\Filament\Resources\ProdukBahanBakuResource\Pages;

use App\Filament\Resources\ProdukBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProdukBahanBaku extends EditRecord
{
    protected static string $resource = ProdukBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
