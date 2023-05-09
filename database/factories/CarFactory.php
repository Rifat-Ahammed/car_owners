<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        return [
            'reg_number'=>$faker->vehicleRegistration('[A-Z]{3} [0-9]{3}'),
            'brand'=>$faker->vehicleBrand,
            'model'=>$faker->vehicleModel
        ];
    }
}
