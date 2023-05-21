<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        // $this->call(BlogSeeder::class);
        $this->call(LecturerSeeder::class);
        $this->call(LibrarySeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(SchoolClassSeeder::class);
        // $this->call(StudentSeeder::class);
    }
}
