<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use App\Models\Ikan;

class DashboardAquarium extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected string $view = 'filament.pages.dashboard-aquarium';

    protected static ?string $title = 'Dashboard Aquarium';

    protected static ?string $navigationLabel = 'Dashboard';

    // 🔥 DATA DIAMBIL DI SINI (BUKAN DI BLADE)
    protected function getViewData(): array
    {
        return [
            'ikans' => Ikan::latest()->get(),
            'total' => Ikan::count(),
            'tawar' => Ikan::where('jenis', 'air tawar')->count(),
            'laut' => Ikan::where('jenis', 'air laut')->count(),
        ];
    }
}