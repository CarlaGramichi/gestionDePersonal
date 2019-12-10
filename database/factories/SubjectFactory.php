<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        'career_course_id'          => $faker->numberBetween(1, 250),
        'career_course_division_id' => $faker->numberBetween(1, 500),
        'regimen_id'                => $faker->numberBetween(1, 3),
        'name'                      => $faker->sentence(3),
        'hours'                     => $faker->numberBetween(2, 20),
    ];
});
