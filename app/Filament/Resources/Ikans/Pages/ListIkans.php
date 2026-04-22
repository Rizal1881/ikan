<?php

namespace App\Filament\Resources\Ikans\Pages;

use App\Filament\Resources\Ikans\IkanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIkans extends ListRecords
{
    protected static string $resource = IkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
