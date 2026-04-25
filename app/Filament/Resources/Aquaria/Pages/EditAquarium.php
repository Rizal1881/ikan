<?php

namespace App\Filament\Resources\Aquaria\Pages;

use App\Filament\Resources\Aquaria\AquariumResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAquarium extends EditRecord
{
    protected static string $resource = AquariumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
