<?php

namespace Database\Seeders;

use App\Models\YearLevel;
use Illuminate\Database\Seeder;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::factory()->count(55)->create();

        YearLevel::create([
            "name" => "1"
        ]);

        YearLevel::create([
            "name" => "2"
        ]);

        YearLevel::create([
            "name" => "3"
        ]);

        YearLevel::create([
            "name" => "4"
        ]);
    }
}
