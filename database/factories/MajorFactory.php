<?php

namespace Database\Factories;

use App\Models\Major;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MajorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Major::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'desc' => $this->faker->text(255),
            'faculty_id' => \App\Models\Faculty::factory(),
        ];
    }
}
