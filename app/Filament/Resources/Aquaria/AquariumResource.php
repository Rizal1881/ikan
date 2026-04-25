<?php

namespace App\Filament\Resources\Aquaria;

use App\Filament\Resources\Aquaria\Pages\CreateAquarium;
use App\Filament\Resources\Aquaria\Pages\EditAquarium;
use App\Filament\Resources\Aquaria\Pages\ListAquaria;
use App\Filament\Resources\Aquaria\Schemas\AquariumForm;
use App\Filament\Resources\Aquaria\Tables\AquariaTable;
use App\Models\Aquarium;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AquariumResource extends Resource
{
    protected static ?string $model = Aquarium::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // 🔥 FIX DISINI
    protected static ?string $recordTitleAttribute = 'nama_aquarium';

    public static function form(Schema $schema): Schema
    {
        return AquariumForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AquariaTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAquaria::route('/'),
            'create' => CreateAquarium::route('/create'),
            'edit' => EditAquarium::route('/{record}/edit'),
        ];
    }
}