<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'product_name' => $this->faker->numerify('Sample Product ###'),
      'product_details' => $this->faker->paragraph(),
      'product_price' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 50, $max = 5000),
      'product_image' => 'no_image.jpg',
      'product_category' => $this->faker->randomDigit(),
    ];
  }
}
