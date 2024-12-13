<?php
namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardStats;

class Dashboard extends \Filament\Pages\Dashboard{
    public function getWidgets(): array
    {
        return [
            DashboardStats::class,
        ];
    }
}
