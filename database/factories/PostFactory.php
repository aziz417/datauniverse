<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words(10, true);
        return [
            'user_id' => Admin::first()->id,
            'title' => $title,
            'description' => $this->faker->paragraphs(10, true),
            'short_description' => $this->faker->paragraphs(1, true),
            'status' => 1,
            'featured' => random_int(0, 1),
            'view' => random_int(0, 20),
        ];
    }
}
