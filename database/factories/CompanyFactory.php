<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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

        return [
            'id' => Str::uuid(),
            'name' => $this->faker->company(),
            'country_id' => $this->faker->randomElement($countries),
            'province' => $this->faker->randomElement($this->provinceList),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'housenumber' => $this->faker->buildingNumber(),
            'zipcode' => $this->faker->postcode(),
        ];
    }
}
