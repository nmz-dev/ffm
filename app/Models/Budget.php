<?php

namespace App\Models;

use App\Enums\BudgetPeriod;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Budget extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'amount',
        'period',
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'category_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
    /**
     * @return array
     */
    public static function getForm(): array
    {
        return [
            Select::make('user_id')
                ->label("User")
                ->relationship('user', 'name'),
            Select::make('category_id')
                ->label("Category")
                ->relationship('category', 'name'),
            TextInput::make('amount'), Select::make('period')->options(BudgetPeriod::class),
        ];
    }
    /**
     * @return array
     */
    public static function getColumns(): array
    {
        return [
            TextColumn::make('user.name'),
            TextColumn::make('category.name'),
            TextColumn::make('amount'),
            TextColumn::make('period'),
            TextColumn::make('start_date')->dateTime(),
            TextColumn::make('end_date')->dateTime(),
        ];
    }

}
