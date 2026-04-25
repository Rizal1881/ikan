<?php

namespace App\Filament\Resources\Aquaria\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class AquariumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nama_aquarium')
                    ->label('Nama Aquarium')
                    ->required()
                    ->maxLength(255),

                TextInput::make('ukuran')
                    ->label('Ukuran')
                    ->required(),

                TextInput::make('lokasi')
                    ->label('Lokasi'),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3),

            ]);
    }
}