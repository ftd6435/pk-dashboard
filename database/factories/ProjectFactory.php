<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "details" => fake()->text(),
            'status' => fake()->randomElement(['en cours', 'en etudes', 'realiser']),
            "startDate" => fake()->dateTime(),
            "endDate" => fake()->dateTime(),
            'testimonial' => fake()->sentences(),
            "client_id" => Client::all()->random(),
            "user_id" => User::all()->random(),
        ];
    }
}
