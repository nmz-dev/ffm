<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BillingReminderResource\Pages;
use App\Models\BillingReminder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BillingReminderResource extends Resource
{
    protected static ?string $model = BillingReminder::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(BillingReminder::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(BillingReminder::getColumns())
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListBillingReminders::route('/'),
            'create' => Pages\CreateBillingReminder::route('/create'),
            'edit' => Pages\EditBillingReminder::route('/{record}/edit'),
        ];
    }


}
