<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Congratulation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Congratulation>
 */
class CongratulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Congratulation::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'identificador' => 'Voca 3',
            "description" => $this -> faker -> text(400),
            'status' => 2,
        ];
    }
}
