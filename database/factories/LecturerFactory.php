<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $universities = [
            'University of Nairobi',
            'Kenyatta University',
            'Strathmore University',
            'Jomo Kenyatta University of Agriculture and Technology',
            'Maseno University',
            'Moi University',
            'Egerton University',
            'Technical University of Kenya',
            'Mount Kenya University',
            'KCA University',
            'Africa Nazarene University',
            'Daystar University',
            'Catholic University of Eastern Africa',
            'United States International University',
            'Kenya Methodist University',
            'Pwani University',
            'Karatina University',
            'Laikipia University',
            'South Eastern Kenya University',
            'Taita Taveta University'
        ];

        return [
            //
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'designation' => $this->faker->randomElement(['Ph.D.', 'M.S.', 'M.B.A.', 'M.A.', 'B.S.']),
            'description' => $this->faker->paragraph(1),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'profile' => 'default.png',
            'currentAddress' => $this->faker->address(),
            'permanentAddress' => $this->faker->address(),
            'qualification' => $this->faker->randomElement(['Ph.D.', 'M.S.', 'M.B.A.', 'M.A.', 'B.S.']),
            'institution' => $this->faker->randomElement($universities),
            'current_position' => $this->faker->randomElement(['Professor', 'Associate Professor', 'Assistant Professor', 'Lecturer']),
            'dob' => $this->faker->date(),
            'status' => 'active',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        

        ];
    }
}
