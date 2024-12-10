<?php

namespace App\Filament\Resources\BillingRemainderResource\Pages;

use App\Filament\Resources\BillingRemainderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBillingRemainders extends ListRecords
{
    protected static string $resource = BillingRemainderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
