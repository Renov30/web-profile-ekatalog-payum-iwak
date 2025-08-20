<?php

namespace App\Filament\Resources\DistrikResource\Pages;

use App\Filament\Resources\DistrikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDistriks extends ListRecords
{
    protected static string $resource = DistrikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
