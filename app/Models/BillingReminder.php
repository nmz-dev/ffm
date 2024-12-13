<?php

namespace App\Models;

use App\Enums\BillingReminderStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillingReminder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'due_date',
        'amount',
        'sent',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'due_date' => 'date',
        'sent' => BillingReminderStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * @return array
     */
    public static function getColumns(): array
    {
        return [
            TextColumn::make('user.name'),
            TextColumn::make('amount'),
            TextColumn::make('due_date')->dateTime(),
            TextColumn::make('sent')->label('Status')->badge()->color(fn(BillingReminderStatus $state): string => match ($state) {
                BillingReminderStatus::PENDING => 'warning',
                BillingReminderStatus::PAID => 'success'
            }),
        ];
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
            TextInput::make('amount')->required(),
            DateTimePicker::make('due_date')->required(),
            ToggleButtons::make('sent')->label('Status')->options(BillingReminderStatus::class)->default(BillingReminderStatus::PENDING)->inline()->grouped(),
        ];
    }

}
