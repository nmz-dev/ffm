<?php

namespace App\Models;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpenseCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public static function getForm():array{
        return [
            TextInput::make('name'),
            TextInput::make('description'),
            Select::make('user_id')->relationship('user', 'name'),
        ];
    }

    public static function getColumns():array{
        return [
            TextColumn::make('name'),
            TextColumn::make('description'),
            TextColumn::make('user.name'),
            TextColumn::make('created_at')->dateTime(),
            TextColumn::make('updated_at')->dateTime(),
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
