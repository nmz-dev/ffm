<?php

namespace App\Filament\Resources\SavingGoalResource\Pages;

use App\Filament\Resources\SavingGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSavingGoals extends ListRecords
{
    protected static string $resource = SavingGoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
