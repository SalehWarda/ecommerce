<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //


                'name'                      => $this->faker->text(60),
                'description'               => $this->faker->paragraph(),
                'short_description'         => $this->faker->paragraph(),
                'price'                     => $this->faker->numberBetween(10,9000),
                'manage_stock'              => false,
                'in_stock'                  => $this->faker->boolean(),
                'slug'                      => $this->faker->slug(),
                'is_active'                 => $this->faker->boolean(),
                'sku'                       => $this->faker->word()

        ];
    }
}
