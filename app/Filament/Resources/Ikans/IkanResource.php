<?php

namespace App\Filament\Resources\Ikans;

use App\Filament\Resources\Ikans\Pages\CreateIkan;
use App\Filament\Resources\Ikans\Pages\EditIkan;
use App\Filament\Resources\Ikans\Pages\ListIkans;
use App\Filament\Resources\Ikans\Schemas\IkanForm;
use App\Filament\Resources\Ikans\Tables\IkansTable;
use App\Models\Ikan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IkanResource extends Resource
{
    protected static ?string $model = Ikan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // 🔥 TAMBAHAN INI
    protected static ?string $navigationLabel = 'Aneka Ikan di Aquarium';
    protected static ?string $pluralLabel = 'Aneka Ikan di Aquarium';
    protected static ?string $label = 'Ikan';

    protected static ?string $recordTitleAttribute = 'nama_ikan';

    public static function form(Schema $schema): Schema
    {
        return IkanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IkansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIkans::route('/'),
            'create' => CreateIkan::route('/create'),
            'edit' => EditIkan::route('/{record}/edit'),
        ];
    }
}