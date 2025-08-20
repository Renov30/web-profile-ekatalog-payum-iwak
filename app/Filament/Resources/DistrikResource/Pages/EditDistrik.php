<?php

namespace App\Filament\Resources\DistrikResource\Pages;

use App\Filament\Resources\DistrikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDistrik extends EditRecord
{
    protected static string $resource = DistrikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
