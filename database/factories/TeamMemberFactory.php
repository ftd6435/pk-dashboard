<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamMember>
 */
class TeamMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "fullName" => fake()->name(),
            "email" => fake()->safeEmail(),
            "position" => fake()->jobTitle(),
            "address" => fake()->address(),
            "description" => fake()->text(),
            "avatar" => fake()->imageUrl(),
            "facebook" => fake()->url(),
            "instagram" => fake()->url(),
            "linkedin" => fake()->url(),
            "user_id" => User::all()->random(),
        ];
    }
}
