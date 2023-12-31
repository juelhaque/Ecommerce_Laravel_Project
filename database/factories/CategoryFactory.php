<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'title'=>$this->faker->word,
            // 'description'=>$this->faker->paragraph,
            // 'image'=>$this->faker->image('storage/app/public', '150', '150', 'cats', false),
            // 'is-active'=>'Test Description',

            'title'=>$this->faker->word,
            'description'=>$this->faker->paragraph,
        ];
    }
}
