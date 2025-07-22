<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function rand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Combination>
 */
final class CombinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->name(),
            'user_id'     => rand(1, 14),
            'description' => $this->faker->sentence(12),
            'tag_line'    => $this->faker->sentence(2),
            'alcohol'     => $this->faker->randomFloat(1, 3.0, 12.0),
            'amargor'     => $this->faker->numberBetween(10, 100),
            'food'        => $this->faker->randomElement([
                'Grilled chicken with herbs',
                'Spicy barbecue ribs',
                'Fresh seafood platter',
                'Aged cheese selection',
                'Dark chocolate dessert',
                'Roasted vegetables medley',
                'Smoked salmon bagel',
                'Pizza margherita',
                'Thai green curry',
                'Mediterranean salad',
            ]),
            'tips'        => $this->faker->sentence(8),
            'img_url'     => $this->faker->imageUrl(640, 480,'food,beer'),
        ];
    }
}
