<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullName' => fake()->name(),
            'email' => fake()->safeEmail(),
            'address' => fake()->address(),
            'profession' => fake()->jobTitle(),
            'image' => fake()->imageUrl(),
            'website' => fake()->url(),
            'user_id' => User::all()->random(),
        ];
    }
}
