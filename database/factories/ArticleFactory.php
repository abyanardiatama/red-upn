<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $heading = $this->faker->sentence(4);
        return [
            'category_id' => $this->faker->numberBetween(1, 6),
            'user_id' => 1,
            'title' => $heading,
            'slug' => $this->faker->slug,
            'image' => "https://loremflickr.com/1920/1080/" . $this->faker->word(),
            'excerpt' => $this->faker->sentences(3, true),
            'body' => $this->generateContentwithTags($heading),
        ];
    }

    private function generateContentwithTags(string $heading): string
    {
        $html = '';

        //heading h2
        $html .= '<h2>' . $heading . '</h2>';

        // paragraph p
        for ($i = 0; $i < 5; $i++) {
            $html .= '<p>' . $this->faker->paragraph(6) . '</p>';
        }

        // list li
        $html .= '<ul>';
        for ($i = 0; $i < rand(3, 7); $i++) {
            $html .= '<li>' . $this->faker->sentence(rand(4, 8)) . '</li>';
        }
        $html .= '</ul>';

        return $html;
    }
}
