<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            //
                'user_id'=>1,
                'post' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae architecto tenetur perferendis. Iusto provident, nostrum quis animi autem ad doloribus eligendi perspiciatis rerum suscipit? Suscipit voluptates magni provident maxime sed.',
                'click' => 1,
        ];
    }
}
