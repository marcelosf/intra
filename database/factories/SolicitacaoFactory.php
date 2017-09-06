<?php


$factory->define(\Intranet\Model\Manutencao\Solicitacao::class, function (Faker\Generator $faker){

    $salaMin = DB::table('local')->min('id');
    $salaMax = DB::table('local')->max('id');

    $usuariosMin = DB::table('oauth_users')->max('id');
    $usuarioMax = DB::table('oauth_users')->max('id');

    $status = [

        'autorizacao',
        'autorizado',
        'andamento',
        'elaboracao',
        'executado',
        'cancelado',
        'aguardando_info',
        'aguardando_material',

    ];


    return [

        'codigo'            => $faker->numberBetween(1, 99) . '/' .$faker->date('y'),
        'local_id'           => $faker->numberBetween($salaMin, $salaMax),
        'descricao'         => $faker->paragraphs(2, true),
        'status'            => $faker->randomElement($status),
        'solicitante_id'    => $faker->numberBetween($usuariosMin, $usuarioMax),
        'responsavel_id'    => $faker->numberBetween($usuariosMin, $usuarioMax),
        'created_at'        => $faker->dateTimeThisMonth,
        'updated_at'        => $faker->dateTimeThisMonth,

    ];

});
