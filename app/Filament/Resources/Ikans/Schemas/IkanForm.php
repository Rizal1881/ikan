<?php

namespace App\Filament\Resources\Ikans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class IkanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('nama_ikan')
                ->label('Nama Ikan')
                ->required()
                ->validationMessages([
                    'required' => 'Nama ikan wajib diisi!',
                ]),

            Select::make('jenis')
                ->label('Jenis')
                ->options([
                    'air tawar' => 'Air Tawar',
                    'air laut' => 'Air Laut',
                ])
                ->required()
                ->validationMessages([
                    'required' => 'Jenis ikan harus dipilih!',
                ]),

            TextInput::make('jumlah')
                ->label('Jumlah')
                ->numeric()
                ->default(0)
                ->required()
                ->validationMessages([
                    'required' => 'Jumlah wajib diisi!',
                    'numeric' => 'Jumlah harus berupa angka!',
                ]),

            Textarea::make('deskripsi')
                ->label('Deskripsi'),

            FileUpload::make('gambar')
                ->label('Gambar')
                ->image()
                ->directory('ikan')
                ->imagePreviewHeight('150')
                ->required()
                ->validationMessages([
                    'required' => 'Gambar wajib diupload!',
                ]),
        ]);
    }
}