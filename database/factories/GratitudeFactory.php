<?php

namespace Database\Factories;

use App\Models\Gratitude;
use Illuminate\Database\Eloquent\Factories\Factory;

class GratitudeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gratitude::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'count' => 22
        ];
    }
}
