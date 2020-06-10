<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entreprise;
use Faker\Generator as Faker;

$factory->define(Entreprise::class, function (Faker $faker) {
    return [
        'nomEntreprise' => $faker->company,
        'typeEntreprise' => $faker->word,
        'telEntreprise' => $faker->phoneNumber,
        'adresseWebEntreprise' => $faker->domainName,
        'rueEntreprise' => $faker->buildingNumber,
        'codePostalEntreprise' => '42000',
        'villeEntreprise' => $faker->city
    ];
});
