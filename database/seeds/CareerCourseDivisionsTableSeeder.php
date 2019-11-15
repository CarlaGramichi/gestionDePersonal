<?php

use App\CareerCourseDivision;
use Illuminate\Database\Seeder;

class CareerCourseDivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CareerCourseDivision::class,500)->create();
    }
}
