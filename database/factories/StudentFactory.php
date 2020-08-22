<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'career_id' => $faker->numberBetween(1, 14),
        'name' => $faker->name,
        'identification' => $faker->randomNumber(8),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'born_date' => $faker->date,
    ];
});
