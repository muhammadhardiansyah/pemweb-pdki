<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\BrandClass;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $userId = User::inRandomOrder()->first()->id;
        $classId = BrandClass::inRandomOrder()->first()->id;

        return [
            'user_id' => $userId,
            'brandClass_id' => $classId,
            'name' => fake()->company(),
            'address' => fake()->address(),
            'owner' => fake()->name(),
            // 'logos' => 
            // 'certificate' => 
            // 'signature' =>
        ];
    }
}
