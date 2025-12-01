<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Project;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Buat 5 kategori
        Category::factory(5)->create();

        // Buat 10 skill
        $skills = Skill::factory(10)->create();

        // Buat 20 project
        Project::factory(20)->create()->each(function($project) use ($skills) {
            // Attach 2-4 skill random
            $project->skills()->attach($skills->random(rand(2,4))->pluck('id'));
        });
        
    }
}
