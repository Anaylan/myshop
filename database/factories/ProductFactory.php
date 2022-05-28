<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(rand(15, 40)),
            'price' => rand(500, 12000),
            'description' => $this->faker->realText(rand(100, 200)),
            'img_prev' => 'https://images.unsplash.com/photo-1578262825743-a4e402caab76?ixlib=rb-1.2.1&auto=format&fit=crop&w=1051&q=80',
            'image' => 'https://c.dns-shop.ru/original/st4/cf211601c267afe36bacfa74ea97184c/a7ae4c87b121cbbd8e63e5856b571529e3f31419db7929092e64784578b4ca63.jpg',
        ];
    }
}
