<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\YearLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $courses = Course::get("id");
        $year_levels = YearLevel::get("id");

        return [
            "name" => $this->faker->company(),
            "description" => $this->faker->catchPhrase(),
            "units" => rand(1, 5),
            "course_id" => $courses->random(1)->pluck('id')->toArray()[0],
            "year_level_id" => $year_levels->random(1)->pluck('id')->toArray()[0],
        ];
    }
}
