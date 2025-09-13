<?php

namespace App\Filament\Resources\OrderDataResource\Pages;

use App\Filament\Resources\OrderDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderData extends ListRecords
{
    protected static string $resource = OrderDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
