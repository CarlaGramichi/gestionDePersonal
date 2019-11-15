<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CareerCourse;
use Faker\Generator as Faker;

$factory->define(CareerCourse::class, function (Faker $faker) {
    return [
        'career_id' => $faker->numberBetween(1, 15),
        'name'      => $faker->sentence(3),
    ];
});
