<?php

namespace App\Models;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticable implements FilamentUser
{
    use HasFactory, HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'family_id',
        'pricing_tier_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'family_id' => 'integer',
        'pricing_tier_id' => 'integer',
    ];

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }

    public function pricingTier(): BelongsTo
    {
        return $this->belongsTo(Pricing::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
    /**
     * @return array
     */
    public static function getForm(): array
    {
        return [
            TextInput::make('name'),
            Select::make('family_id')
                ->label("Family")
                ->relationship('family', 'name'),
            TextInput::make('email'),
            TextInput::make('password'),
        ];
    }
    /**
     * @return array
     */
    public static function getColumns(): array
    {
        return [
            TextColumn::make('name'),
            TextColumn::make('email'),
            TextColumn::make('family.name')
                ->label("Family"),
            TextColumn::make('created_at')
                ->dateTime(),
            TextColumn::make('updated_at')
                ->dateTime(),
        ];
    }

}
