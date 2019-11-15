<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agent;
use Faker\Generator as Faker;

$factory->define(Agent::class, function (Faker $faker) {

    return [
        'name'       => $faker->name,
        'surname'    => $faker->lastName,
        'dni'        => $faker->randomNumber(8, true),
        'cuil'       => $faker->randomElement(['20', '21', '22']) . $faker->randomNumber(8, true) . $faker->randomElement(['1', '7', '9']),
        'born_date'  => $faker->dateTimeBetween('-55 years', '-19 years')->format('Y-m-d'),
        'email'      => $faker->email,
        'phone'      => $faker->phoneNumber,
        'cellphone'  => $faker->phoneNumber,
        'address'    => $faker->address,
        'city'       => $faker->city,
        'state'      => $faker->city,
        'country'    => $faker->country,

    ];
});
