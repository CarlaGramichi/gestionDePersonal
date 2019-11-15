<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Career;
use Faker\Generator as Faker;

$factory->define(Career::class, function (Faker $faker) {
    return [
        'year' => $faker->numberBetween(2018, 2020),
        'name' => $faker->sentence(3),
    ];
});
