<?php

namespace App\Filament\Resources\BillingReminderResource\Pages;

use App\Filament\Resources\BillingReminderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBillingReminders extends ListRecords
{
    protected static string $resource = BillingReminderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
