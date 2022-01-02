<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Subject::factory()->count(55)->create();

        // BEED 1st year
        Subject::create([
            "name" => "GE 101",
            "description" => "",
            "units" => "3",
            "year_level_id" => "1",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "GE 102",
            "description" => "",
            "units" => "3",
            "year_level_id" => "1",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "GE 103",
            "description" => "",
            "units" => "3",
            "year_level_id" => "1",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "GE 104",
            "description" => "",
            "units" => "3",
            "year_level_id" => "1",
            "course_id" => "1",
        ]);

        // BEED 2nd year
        Subject::create([
            "name" => "GEM 101",
            "description" => "",
            "units" => "3",
            "year_level_id" => "2",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "SPEC 105",
            "description" => "",
            "units" => "3",
            "year_level_id" => "2",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "SPEC 106",
            "description" => "",
            "units" => "3",
            "year_level_id" => "2",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "SPEC 107",
            "description" => "",
            "units" => "3",
            "year_level_id" => "2",
            "course_id" => "1",
        ]);

        // BEED 3rd year
        Subject::create([
            "name" => "SPEC 113",
            "description" => "",
            "units" => "3",
            "year_level_id" => "3",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "SPEC 114",
            "description" => "",
            "units" => "3",
            "year_level_id" => "3",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "SPEC 115",
            "description" => "",
            "units" => "3",
            "year_level_id" => "3",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "Spec 116",
            "description" => "",
            "units" => "3",
            "year_level_id" => "3",
            "course_id" => "1",
        ]);

        // BEED 4th year
        Subject::create([
            "name" => "FS 101",
            "description" => "",
            "units" => "3",
            "year_level_id" => "4",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "FS 102",
            "description" => "",
            "units" => "3",
            "year_level_id" => "4",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "ED 111",
            "description" => "",
            "units" => "3",
            "year_level_id" => "4",
            "course_id" => "1",
        ]);

        Subject::create([
            "name" => "SPEC 121",
            "description" => "",
            "units" => "3",
            "year_level_id" => "4",
            "course_id" => "1",
        ]);

        // BSIT 1st year
        Subject::create([
            "name" => "NSTP 101",
            "description" => "",
            "units" => "3",
            "year_level_id" => "1",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "CS 103",
            "description" => "",
            "units" => "3",
            "year_level_id" => "1",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "CS 101",
            "description" => "",
            "units" => "3",
            "year_level_id" => "1",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "CS 102",
            "description" => "",
            "units" => "3",
            "year_level_id" => "1",
            "course_id" => "5",
        ]);

        // BSIT 2nd year
        Subject::create([
            "name" => "GE 108",
            "description" => "",
            "units" => "3",
            "year_level_id" => "2",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "GE 110",
            "description" => "",
            "units" => "3",
            "year_level_id" => "2",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "CMSC 105",
            "description" => "",
            "units" => "3",
            "year_level_id" => "2",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "CMSC 106",
            "description" => "",
            "units" => "3",
            "year_level_id" => "2",
            "course_id" => "5",
        ]);

        // BSIT 3rd year
        Subject::create([
            "name" => "NET 102",
            "description" => "",
            "units" => "3",
            "year_level_id" => "3",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "STA 101",
            "description" => "",
            "units" => "3",
            "year_level_id" => "3",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "CMCS 101",
            "description" => "",
            "units" => "3",
            "year_level_id" => "3",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "Free Elec 3",
            "description" => "",
            "units" => "3",
            "year_level_id" => "3",
            "course_id" => "5",
        ]);

        // BSIT 4th year
        Subject::create([
            "name" => "GEE 104",
            "description" => "",
            "units" => "3",
            "year_level_id" => "4",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "SA 101",
            "description" => "",
            "units" => "3",
            "year_level_id" => "4",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "CAP 102",
            "description" => "",
            "units" => "3",
            "year_level_id" => "4",
            "course_id" => "5",
        ]);

        Subject::create([
            "name" => "IT Elec 4",
            "description" => "",
            "units" => "3",
            "year_level_id" => "4",
            "course_id" => "5",
        ]);
    }
}
