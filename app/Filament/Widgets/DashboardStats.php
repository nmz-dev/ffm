<?php

namespace App\Filament\Widgets;

use App\Models\Family;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Families',Family::count()),
            Stat::make('Total Users',User::whereHas('family')->count()),
        ];
    }
}
