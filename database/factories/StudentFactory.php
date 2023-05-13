<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'profile' => 'default.png',
            'program' => 'Bsc. Computer Science',
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'country' => $this->faker->country(),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'id_no' => $this->faker->randomNumber(),
            'adm_no' => $this->faker->randomNumber(), 
            'dob' => $this->faker->date(),
            'status' => 'active',
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
           

      

        ];
    }
}
