<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annoucement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->title(),
            'description'=>$this->faker->unique()->text(),
            'start_at'=>$this->faker->unique()->date(),
            'end_at'=>$this->faker->unique->date(),
            'category_id'=>$this->faker->numberBetween(1,3),
        ];
    }
}
