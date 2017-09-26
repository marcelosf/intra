<?php

$factory->define(\Intranet\Model\Manutencao\OS::class, function (Faker\Generator $faker){

    $solicitacaoMin = \Illuminate\Support\Facades\DB::table('manutencao_solicitacoes')->min('id');
    $solicitacaoMax = \Illuminate\Support\Facades\DB::table('manutencao_solicitacoes')->max('id');


    $tecnicaMin = \Illuminate\Support\Facades\DB::table('manutencao_tecnicas')->min('id');
    $tecnicaMax = \Illuminate\Support\Facades\DB::table('manutencao_tecnicas')->max('id');

    $userMin = \Illuminate\Support\Facades\DB::table('oauth_users')->max('id');
    $userMax = \Illuminate\Support\Facades\DB::table('oauth_users')->max('id');

    $status = [

        'autorizado',
        'andamento',
        'resolvido',
        'cancelado',
        'aguardando_info',
        'aguardando_material',

    ];

    return [

        'codigo'            => $faker->numberBetween(1, 99) . '/' .$faker->date('y'),
        'solicitacao_id'    => $faker->numberBetween($solicitacaoMin, $solicitacaoMax),
        'status'            => $faker->randomElement($status),
        'relatorio'         => $faker->paragraph(3),
        'descricao'         => $faker->paragraph(3),
        'tecnica_id'        => $faker->numberBetween($tecnicaMin, $tecnicaMax),
        'data_termino'      => $faker->dateTimeThisMonth,
        'created_at'        => $faker->dateTimeThisMonth,
        'updated_at'        => $faker->dateTimeThisMonth,
        'gestor_id'         => $faker->numberBetween($userMin, $userMax),

    ];

});