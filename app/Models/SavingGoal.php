<?php

namespace App\Models;

use App\Enums\SavingGoalStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavingGoal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'target_amount',
        'current_amount',
        'target_date',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'target_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * @return array
     */
    public static function getForm(): array
    {
        return [
            Select::make('user_id')
                ->label("User")
                ->relationship('user', 'name')->required(),
            TextInput::make('target_amount')->required(),
            TextInput::make('current_amount')->required(),
            DateTimePicker::make('target_date')->required(),
            ToggleButtons::make('status')->options(SavingGoalStatus::class)->default(SavingGoalStatus::Ongoing)->inline()->grouped(),
        ];
    }
    /**
     * @return array
     */
    public static function getColumns(): array
    {
        return [
            TextColumn::make('user.name'),
            TextColumn::make('target_amount'),
            TextColumn::make('current_amount'),
            TextColumn::make('target_date'),
            TextColumn::make('status')->label('Status')->badge()->color(fn(SavingGoalStatus $state): string => match ($state) {
                SavingGoalStatus::Ongoing => 'warning',
                SavingGoalStatus::Completed => 'success',
                SavingGoalStatus::Cancelled => 'danger',
            }),
            TextColumn::make('created_at')->dateTime(),
            TextColumn::make('updated_at')->dateTime(),
        ];
    }

}
