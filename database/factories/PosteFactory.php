<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offre;
use Faker\Generator as Faker;

$factory->define(Offre::class, function (Faker $faker) {
    return [
        'nomOffre' => $faker->jobTitle,
        'dureeOffre' => '30 jours',
        'descriptionOffre' => 'Creation d\'une application web',
        'competencesOffre' => 'php',
        'teleTravailOffre' => 'oui',
        'entreprise_id' => '1'
    ];
});
