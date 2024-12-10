<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SavingGoalResource\Pages;
use App\Filament\Resources\SavingGoalResource\RelationManagers;
use App\Models\SavingGoal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SavingGoalResource extends Resource
{
    protected static ?string $model = SavingGoal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
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
            'index' => Pages\ListSavingGoals::route('/'),
            'create' => Pages\CreateSavingGoal::route('/create'),
            'edit' => Pages\EditSavingGoal::route('/{record}/edit'),
        ];
    }
}
