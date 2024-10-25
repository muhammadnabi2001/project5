<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model=Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'price'=>rand(200,500),
            'count'=>rand(50,300),
            'img'=>fake()->imageUrl(),
            'user_id'=>User::inRandomOrder()->value('id'),
            'company_id'=>Company::inRandomOrder()->value('id'),
        ];
    }
}
