<?php

namespace Database\Factories;

use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CareerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Career::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $title = $this->faker->sentence(5);
        return [
            'title'      => $title,
            'slug'       => Str::slug($title),
            'desc'       => $this->faker->sentence(300),
            'status'     => random_int(0, 1),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
