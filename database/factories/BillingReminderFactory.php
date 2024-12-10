<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BillingReminder;
use App\Models\User;

class BillingReminderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BillingReminder::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'due_date' => $this->faker->date(),
            'amount' => $this->faker->word(),
            'sent' => $this->faker->boolean(),
        ];
    }
}
