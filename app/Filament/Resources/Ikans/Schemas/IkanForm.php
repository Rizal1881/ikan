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

            // 🔥 TAMBAHAN RELASI AQUARIUM
            Select::make('aquarium_id')
                ->label('Aquarium')
                ->relationship('aquarium', 'nama_aquarium')
                ->searchable()
                ->preload()
                ->required()
                ->validationMessages([
                    'required' => 'Aquarium wajib dipilih!',
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
                ->disk('public')
                ->visibility('public')
                ->getUploadedFileNameForStorageUsing(function ($file) {
                    return time() . '_' . $file->getClientOriginalName();
                })
                ->saveUploadedFileUsing(function ($file) {
                    $filename = time() . '.' . $file->getClientOriginalExtension();

                    if (!file_exists(public_path('ikan'))) {
                        mkdir(public_path('ikan'), 0777, true);
                    }

                    $path = $file->storeAs('ikan', $filename, 'public');

                    copy(
                        storage_path('app/public/' . $path),
                        public_path('ikan/' . $filename)
                    );

                    return 'ikan/' . $filename;
                })
                ->imagePreviewHeight('150')
                ->required(),

        ]);
    }
}