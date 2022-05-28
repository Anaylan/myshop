<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->realText(rand(30, 40));
        $content = '<p>' . $this->faker->realText(rand(400, 500)) . '</p>' .
            '<p>' . $this->faker->realText(rand(400, 500)) . '</p>' .
            '<p>' . $this->faker->realText(rand(400, 500)) . '</p>';
        return [
            'title' => $name,
            'slug' =>  Str::slug($this->faker->realText(rand(20, 30))),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'category_id' => $this->faker->randomElement(Category::pluck('id')),
            'imagePath' => 'https://play-lh.googleusercontent.com/0bVs9-3xq573KI9u2hqZ86ARwltcoBv4RGOTI58Sw-xClAfl8dYdd9eYn2vf0D2HMA',
            'body' => $content
        ];
    }
}
