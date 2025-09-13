<?php

namespace App\Filament\Resources\KategoriProdukResource\Pages;

use App\Filament\Resources\KategoriProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriProduk extends EditRecord
{
    protected static string $resource = KategoriProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
