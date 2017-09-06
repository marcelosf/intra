<?php

$factory->define(\Intranet\Model\Ramais\Ramal::class, function (Faker\Generator $faker) {

    return [

        'numero' => $faker->phoneNumber,
        'created_at' => $faker->dateTimeThisMonth,
        'updated_at' => $faker->dateTimeThisMonth,

    ];

});
