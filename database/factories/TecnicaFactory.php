<?php

$factory->define(\Intranet\Model\Manutencao\Tecnica::class, function (Faker\Generator $faker){

    return [

        'nome' => $faker->words(1, true),
        'created_at' => $faker->dateTimeThisMonth,
        'updated_at' => $faker->dateTimeThisMonth,

    ];

});