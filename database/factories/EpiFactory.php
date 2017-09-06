<?php


$factory->define(Intranet\Model\Manutencao\Epi::class, function (\Faker\Generator $faker) {

    return [
        'equipamento' => $faker->randomElement(['Óculos', 'Luvas', 'Protetor Auricular', 'Perneira' ])
    ];

});
