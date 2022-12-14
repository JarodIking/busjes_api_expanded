<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    private array $provinceList = [
        "Groningen",
        "Friesland",
        "Drenthe",
        "Overijssel",
        "Flevoland",
        "Gelderland",
        "Utrecht",
        "Noord-Holland",
        "Zuid-Holland",
        "Zeeland",
        "Noord-Brabant",
        "Limburg",
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $countries = DB::table('countries')->pluck('id');
        $firstname = $this->faker->firstName();
        $lastname = $this->faker->lastName();

        //store and log test user password for debugging purposes
        $password = Str::random(60);
        Log::info('User Data', (array)print_r([$firstname, $lastname, $password]));

        return [
            'id' => Str::uuid(),
            'username' => $firstname . $lastname,
            'password' => Hash::make($password),
            'api_token' => Str::random(60),
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $firstname . $lastname . '@mail.com',
            'country_id' => $this->faker->randomElement($countries),
            'province' => $this->provinceList[array_rand($this->provinceList, 1)],
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'housenumber' => $this->faker->buildingNumber(),
            'zipcode' => $this->faker->postcode(),
        ];
    }
}
