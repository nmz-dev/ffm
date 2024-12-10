<?php

namespace App\Models;

use App\Enums\TransactionTypes;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'amount',
        'date',
        'description',
        'type',
        'category_id',
        'source_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'date' => 'date',
        'category_id' => 'integer',
        'source_id' => 'integer',
        'type' => TransactionTypes::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class);
        //use Illuminate\Support\Facades\Storage;
        $remoteFileName = '/' . $fileArray['fileName'];
        $uploaded = Storage::disk('ftp')->put($remoteFileName, file_get_contents($localFilePath));

        if ($uploaded) {
            \Log::info('File uploaded successfully');
        } else {
            \Log::info('File upload failed');
        }
    }


    public function source(): BelongsTo
    {
        return $this->belongsTo(IncomeSource::class);
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
            TextInput::make('amount'),
            DateTimePicker::make('date'),
            TextInput::make('description'),
            Select::make('type')
            ->options(TransactionTypes::class),
            Select::make('category_id')
                ->label("Category")
                ->relationship('category', 'name'),
            Select::make('source_id')
                ->label("Source")
                ->relationship('source', 'name'),
        ];
    }

}
