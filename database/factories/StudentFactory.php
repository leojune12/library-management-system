<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\Semester;
use App\Models\YearLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $academic_years = AcademicYear::get("id");
        $semesters = Semester::get("id");
        $year_levels = YearLevel::get("id");
        $courses = Course::get("id");

        return [
            "id_number" => "ID-" . strval(rand(10000, 99999)),
            "first_name" => $this->faker->firstName(),
            "middle_name" => $this->faker->lastName(),
            "last_name" => $this->faker->lastName(),
            "gender_id" => rand(1,2),
            "address" => $this->faker->streetAddress(),
            "academic_year_id" => $academic_years->random(1)->pluck('id')->toArray()[0],
            "semester_id" => $semesters->random(1)->pluck('id')->toArray()[0],
            "year_level_id" => $year_levels->random(1)->pluck('id')->toArray()[0],
            "course_id" => $courses->random(1)->pluck('id')->toArray()[0],
        ];
    }
}
