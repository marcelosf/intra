<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Intranet\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Intranet\Model\Local\Local::class, function(Faker\Generator $faker) {

    return [
        'build' => strtoupper($faker->randomLetter),
        'floor' => $faker->randomNumber(1),
        'name'  => $faker->randomNumber(3),
        'type'  => $faker->randomElement(['Sala', 'Corredor', 'Bolsão', 'Sala de aula', 'Estacionamento']),
        'department' => $faker->randomElement(['Astronomia', 'Geofísica', 'Ciências Atmosféricas'])
    ];

});