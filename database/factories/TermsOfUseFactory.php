<?php

namespace Database\Factories;

use App\Models\TermsOfUse;
use Illuminate\Database\Eloquent\Factories\Factory;

class TermsOfUseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TermsOfUse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'terms_of_use' => $this->faker->sentence(1000),
        ];
    }
}
