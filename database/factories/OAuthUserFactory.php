<?php

$factory->define(\Schneider\OAuthUsp\app\Http\Model\OauthUsers::class, function (Faker\Generator $faker) {

    $types = new stdClass();
    $types->nomeSetor = $faker->company;
    $types->codigoSetor = $faker->randomLetter;
    $types->nomeUnidade = 'Istituto de Astronomia Geofísica e Ciências Atmosféricas';
    $types->nomeVinculo = $faker->randomElement(['Servidor', 'Professor', 'Aluno']);
    $types->tipoVinculo = $faker->randomElement(['Servidor', 'Professor', 'Aluno']);
    $types->siglaUnidade = 'IAG';
    $types->codigoUnidade = '14';
    $types->nomeAbreviadoSetor = $faker->words(1, true);
    $types->nomeAbreviadoFuncao = $faker->word;



    return [
        'login' => $faker->name,
        'name' => $faker->name,
        'type' => $faker->word,
        'main_email' => $faker->email,
        'alternative_email' => $faker->email,
        'usp_email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'remember_token' => $faker->md5,
        'types' => json_encode([$types])
    ];
});