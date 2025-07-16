<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\AnimalClaw;
use App\Models\CategoryPost;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
           CategoriesSeeder::class,
           ProductsSeeder::class,
           ProductDetailsSeeder::class,
           CategoryPostSeeder::class,
           PostSeeder::class,
            CarsTableSeeder::class,
            OwnersTableSeeder::class,
            CarOwnerSeeder::class,
            ProjectsTableSeeder::class,
            SkillsTableSeeder::class,
            ProjectSkillSeeder::class,
            TasksTableSeeder::class
                ]);
    }
}
