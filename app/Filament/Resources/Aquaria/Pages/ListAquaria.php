<?php

namespace App\Filament\Resources\Aquaria\Pages;

use App\Filament\Resources\Aquaria\AquariumResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAquaria extends ListRecords
{
    protected static string $resource = AquariumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
