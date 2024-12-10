<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Family;
use App\Models\Membership;

class MembershipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Membership::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'family_id' => Family::factory(),
            'member_count' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->randomElement(["free","paid"]),
        ];
    }
}
