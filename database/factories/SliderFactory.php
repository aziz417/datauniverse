<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence;
        return [
            'title' => $name,
            'slug' => Str::slug($name),
            'desc' => $this->faker->sentence(50),
            'btn_link' => '#',
            'status' => random_int(0, 1),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
