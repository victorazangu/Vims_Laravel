<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $couse_type = ['full-time', 'part-time', 'online'];
        return [    
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
            'program_id' => $this->faker->randomElement(Program::pluck('id')),
            'lecturer_id' => $this->faker->randomElement(Lecturer::pluck('id')),
            'country' => $this->faker->country(),
            'state' => $this->faker->state(),
            'county' => $this->faker->city(),
            'city' => $this->faker->city(),
            'venue' => $this->faker->address(),
            'starts' => $this->faker->date(),
            'ends' => $this->faker->date(),
            'day' => $this->faker->date(),
            'type' => $this->faker->randomElement($couse_type),
            'url' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean(),
        ];
    }
}
