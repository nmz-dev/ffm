<?php

namespace App\Filament\Resources\BillingRemainderResource\Pages;

use App\Filament\Resources\BillingRemainderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBillingRemainder extends EditRecord
{
    protected static string $resource = BillingRemainderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
