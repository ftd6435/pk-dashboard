<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Client;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(4)->create();
        Client::factory(10)->create();
        Category::factory(5)->create();
        Post::factory(15)->create();
        Project::factory(16)->create();
        Service::factory(6)->create();
        TeamMember::factory(6)->create();
    }
}
