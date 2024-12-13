<?php

namespace App\Models;

use App\Enums\MemberShipStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Membership extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'family_id',
        'member_count',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'family_id' => 'integer',
    ];

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }
    /**
     * @return array
     */
    public static function getForm(): array
    {
        return [
            Select::make('family_id')
                ->label("Family")
                ->relationship('family', 'name'),
            TextInput::make('member_count'),
            ToggleButtons::make('status')->label('Current Membership')->options(MembershipStatus::class)->default(MembershipStatus::Free)->inline()->grouped(),
        ];
    }
    /**
     * @return array
     */
    public static function getColumns(): array
    {
        return [
            TextColumn::make('family.name'),
            TextColumn::make('member_count'),
            TextColumn::make('status')->label('Status')->badge()->color(fn(MemberShipStatus $state): string => match ($state) {
                MemberShipStatus::Free => 'gray',
                MemberShipStatus::Paid => 'success',
            })
        ];
    }

}
