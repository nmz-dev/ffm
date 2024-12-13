<?php

namespace App\Models;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'cost',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * @return array
     */
    public static function getForm(): array
    {
        return [
            TextInput::make('name')->required(),
            TextInput::make('description')->required(),
            TextInput::make('cost')->required()
        ];
    }
    /**
     * @return array
     */
    public static function getColumns(): array
    {
        return [
            TextColumn::make('name'),
            TextColumn::make('description'),
            TextColumn::make('cost')->money('SGD'),
        ];
    }

}
