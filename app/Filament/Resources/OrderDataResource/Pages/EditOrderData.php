<?php

namespace App\Filament\Resources\OrderDataResource\Pages;

use App\Filament\Resources\OrderDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderData extends EditRecord
{
    protected static string $resource = OrderDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
