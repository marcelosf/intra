<?php



$factory->define(Intranet\Model\Local\Local::class, function(Faker\Generator $faker) {

return [
'build' => strtoupper($faker->randomLetter),
'floor' => $faker->randomNumber(1),
'name'  => $faker->randomNumber(3),
'type'  => $faker->randomElement(['Sala', 'Corredor', 'Bolsão', 'Sala de aula', 'Estacionamento']),
'department' => $faker->randomElement(['Astronomia', 'Geofísica', 'Ciências Atmosféricas'])
];

});