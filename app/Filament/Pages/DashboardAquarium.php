<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use App\Models\Ikan;
use App\Models\Aquarium;

class DashboardAquarium extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected string $view = 'filament.pages.dashboard-aquarium';

    protected static ?string $title = 'Dashboard Aquarium';
    protected static ?string $navigationLabel = 'Dashboard';

    protected int|string|array $columnSpan = 'full';

    protected function getViewData(): array
    {
        $aquariums = Aquarium::all();

        return [
            'aquariums' => $aquariums,
            'ikans' => Ikan::with('aquarium')->get(),

            'total' => Ikan::count(),
            'tawar' => Ikan::where('jenis', 'air tawar')->count(),
            'laut' => Ikan::where('jenis', 'air laut')->count(),
        ];
    }
}