<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SavingGoal;
use App\Models\User;

class SavingGoalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SavingGoal::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'target_amount' => $this->faker->word(),
            'current_amount' => $this->faker->word(),
            'target_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(["ongoing","completed","canceled"]),
        ];
    }
}
