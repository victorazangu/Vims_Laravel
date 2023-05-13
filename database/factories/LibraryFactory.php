<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Library>
 */
class LibraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bookCategories = [
            'Fiction',
            'Non-fiction',
            'Science fiction and fantasy',
            'Mystery and thriller',
            'Romance'
        ];
        $bookTitles = [
            'The Road to Love',
            'The Silent Planet',
            'The Lost World',
            'The Art of Seduction',
            'The Power of Now',
            'The Seven Habits of Highly Effective People',
            'The Catcher in the Rye',
            'The Da Vinci Code',
            'The Adventures of Huckleberry Finn',
            'The Lord of the Rings',
            'The Hunger Games',
            'Pride and Prejudice',
            'To Kill a Mockingbird',
            'The Great Gatsby',
            'One Hundred Years of Solitude',
            'Brave New World',
            '1984',
            'The Hitchhiker\'s Guide to the Galaxy',
            'The Name of the Wind',
            'The Fault in Our Stars'
        ];
        

        return [
            'title' => $this->faker->randomElement($bookTitles),
            'author' => $this->faker->name(),
            'category' => $this->faker->randomElement($bookCategories),
            'description' => $this->faker->sentence(10),
            'amount' => $this->faker->numberBetween(100,1000),
            'discount'=> $this->faker->numberBetween(2,10),
            'image'=> $this->faker->imageUrl(),

        ];
    }
}
