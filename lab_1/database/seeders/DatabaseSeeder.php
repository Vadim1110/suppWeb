<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        $this->call([
            StatusSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
