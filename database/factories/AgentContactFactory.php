<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AgentContact;
use App\Model;
use Faker\Generator as Faker;

$factory->define(AgentContact::class, function (Faker $faker) {
    return [
        'agent_id'        => $faker->unique()->numberBetween(1, 100),
        'relationship_id' => rand(1, 5),
        'name'            => $faker->name,
        'surname'         => $faker->lastName,
        'dni'             => $faker->randomNumber(8, true),
        'born_date'       => $faker->dateTimeBetween('-55 years', '-19 years')->format('Y-m-d'),
        'email'           => $faker->email,
        'phone'           => $faker->phoneNumber,
        'cellphone'       => $faker->phoneNumber,
        'address'         => $faker->address,
        'city'            => $faker->city,
        'state'           => $faker->city,
        'country'         => $faker->country,
    ];
});
