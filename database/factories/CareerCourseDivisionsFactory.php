<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CareerCourseDivision;
use Faker\Generator as Faker;

$factory->define(CareerCourseDivision::class, function (Faker $faker) {
    return [
        'career_course_id' => $faker->numberBetween(1, 250),
        'name'             => $faker->randomElement(['A', 'B', 'C']),
    ];
});
