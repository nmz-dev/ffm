<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncomeSourceResource\Pages;
use App\Filament\Resources\IncomeSourceResource\RelationManagers;
use App\Models\IncomeSource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IncomeSourceResource extends Resource
{
    protected static ?string $model = IncomeSource::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(IncomeSource::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(IncomeSource::getColumns())
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
            'index' => Pages\ListIncomeSources::route('/'),
            'create' => Pages\CreateIncomeSource::route('/create'),
            'edit' => Pages\EditIncomeSource::route('/{record}/edit'),
        ];
    }
}
