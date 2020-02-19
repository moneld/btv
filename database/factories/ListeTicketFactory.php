<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\ListeTicket;
use Faker\Generator as Faker;

$factory->define(ListeTicket::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence(),
        'emplacement' => $faker->paragraph(),
        'lieu_depot' => $faker->address,
        'date' => $faker->date(),
        'type' => $faker->word,
        'statut' => $faker->randomElement(['0','1']),
        'service_id' => $faker->randomElement(['1','2']),
    ];
});
