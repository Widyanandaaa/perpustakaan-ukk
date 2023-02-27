<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cover' => 'test',
            'book_synopsis' => 'test',
            'author' => 'Zidane',
            'publisher' => 'Widyananda',
            'publication_year' => 2005,
            'title' => 'K-ON!',
            'book_category' => 'Manga',
            'book_genre' => 'comedy',
            'book_code' => 'ZY987',
            'book_count' => 7,
        ];
    }
}
