<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class AdFactory extends Factory
{
    protected $model = \App\Models\Ad::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'category_id' => fn() => Category::inRandomOrder()->first()->id, 
            'description' => $this->faker->paragraph(),
            'photo' => 'ads_photos/' . $this->faker->image('storage/app/public/ads_photos', 640, 480, null, false),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'location' => $this->faker->city(),
            'condition' => $this->faker->randomElement(['new', 'good', 'used']),
        ];
    }
}
