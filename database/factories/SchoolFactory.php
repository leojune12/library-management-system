<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => "CAPIZ STATE UNIVERSITY - Pilar Satellite College",
            "address" => "Natividad, Pilar, Capiz",
        ];
    }
}
