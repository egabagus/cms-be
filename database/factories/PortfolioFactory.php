<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    protected $model = Portfolio::class;

    public function definition(): array
    {
        return [
            'order' => $this->faker->numberBetween(0, 9),
            'title' => $this->faker->sentence(), // Mengganti title() dengan sentence()
            'meta_desc' => Str::random(10),
            'description' => $this->faker->paragraph(),
            'link' => $this->faker->url(), // Mengganti link() dengan url()
            'tech' => Str::random(1),
            'status' => 1
        ];
    }
}
