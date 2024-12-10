<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ExpenseCategory;
use App\Models\IncomeSource;
use App\Models\Transaction;
use App\Models\User;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'amount' => $this->faker->word(),
            'date' => $this->faker->date(),
            'description' => $this->faker->text(),
            'type' => $this->faker->randomElement(["income","expense"]),
            'category_id' => ExpenseCategory::factory(),
            'source_id' => IncomeSource::factory(),
        ];
    }
}
