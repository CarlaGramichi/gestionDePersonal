<?php

use App\CareerCourse;
use Illuminate\Database\Seeder;

class CareerCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CareerCourse::class, 250)->create();
    }
}
