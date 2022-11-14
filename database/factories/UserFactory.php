<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Faker\Provider\nl_NL\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'username' => Str::random(10),
            'password' => Hash::make(Str::random(10)),
            'api_token' => Str::random(60),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => 'test@test.test',
            'province' => 'unkown',
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'housenumber' => $this->faker->buildingNumber(),
            'zipcode' => $this->faker->postcode(),
        ];
    }
}
