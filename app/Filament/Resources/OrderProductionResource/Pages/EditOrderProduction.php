<?php

namespace App\Filament\Resources\OrderProductionResource\Pages;

use App\Filament\Resources\OrderProductionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderProduction extends EditRecord
{
    protected static string $resource = OrderProductionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
