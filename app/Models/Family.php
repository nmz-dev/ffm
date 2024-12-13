<?php

namespace App\Models;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Family extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function user():belongsTo{
        return $this->belongsTo(User::class);
    }
    /**
     * @return array
     */
    public static function getColumns(): array
    {
        return [
            TextColumn::make('name'),
            TextColumn::make('created_at')
                ->dateTime(),
            TextColumn::make('updated_at')
                ->dateTime()
        ];
    }
    /**
     * @return array
     */
    public static function getForm(): array
    {
        return [
            TextInput::make('name')
        ];
    }
}
