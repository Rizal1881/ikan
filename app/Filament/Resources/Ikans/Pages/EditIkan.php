<?php

namespace App\Filament\Resources\Ikans\Pages;

use App\Filament\Resources\Ikans\IkanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIkan extends EditRecord
{
    protected static string $resource = IkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
