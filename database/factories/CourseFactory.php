<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $couse_type = ['full-time', 'part-time', 'online'];
        $university_minors = [
            "Data Science",
            "Cognitive Science",
            "Entrepreneurship",
            "Sustainable Energy",
            "Film Studies",
            "Public Health",
            "Creative Writing",
            "Human Resource Management",
            "International Studies",
            "Graphic Design",
            "Environmental Studies",
            "Cybersecurity",
            "Music Technology",
            "Global Business",
            "Sports Management",
            "Spanish Language and Culture",
            "Gender and Sexuality Studies",
            "Legal Studies",
            "Theatre Arts",
            "Anthropology"
        ];


        return [
            'course_name' => $this->faker->randomElement($university_minors),
            'description' => $this->faker->text(),
            'category' => $this->faker->randomElement(['IT', 'Business', 'Engineering', 'Medicine', 'Law', 'Education', 'Agriculture', 'Arts']),
            'course_image' => $this->faker->imageUrl(),
            'duration' => $this->faker->numberBetween(1, 4),
            'status' => $this->faker->boolean(),
            'type' => $this->faker->randomElement($couse_type),
            'amount' => $this->faker->numberBetween(100, 1000),
            'discount' => $this->faker->numberBetween(2, 10),
            'starts' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'ends' => $this->faker->dateTimeBetween('+3 day', '+3 year')->format('Y-m-d'),

        ];
    }
}
