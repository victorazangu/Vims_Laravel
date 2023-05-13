<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $university_programs = [
            "Computer Science",
            "Psychology",
            "Business Administration",
            "Engineering",
            "Education",
            "Medicine",
            "Law",
            "Nursing",
            "Accounting",
            "Political Science",
            "Biology",
            "Communications",
            "Economics",
            "Mathematics",
            "Architecture",
            "Environmental Science",
            "History",
            "Linguistics",
            "Sociology",
            "Fine Arts"
        ];

        return [
            //

            'name' => $this->faker->randomElement($university_programs),
            'duration' => $this->faker->numberBetween(10, 30),
            'description' => $this->faker->sentence(10),
            'amount' => $this->faker->numberBetween(100, 1000),
            'discount' => $this->faker->numberBetween(2, 10),
            'image' => $this->faker->imageUrl(),
            'contact' => $this->faker->phoneNumber(),
            'contact_name' => $this->faker->name(),
            'country' => $this->faker->country(),
            'starts' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'ends' => $this->faker->dateTimeBetween('+3 day', '+3 year')->format('Y-m-d'),        
            'status' => $this->faker->boolean(),


        ];
    }
}
