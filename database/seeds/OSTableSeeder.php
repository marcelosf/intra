<?php

use Illuminate\Database\Seeder;

class OSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $epi_min = \Illuminate\Support\Facades\DB::table('epi')->min('id');
        $epi_max = \Illuminate\Support\Facades\DB::table('epi')->max('id');

        $user_min = \Illuminate\Support\Facades\DB::table('oauth_users')->min('id');
        $user_max = \Illuminate\Support\Facades\DB::table('oauth_users')->max('id');

        factory(\Intranet\Model\Manutencao\OS::class, 50)->create()->each(function ($os) use ($epi_min, $epi_max, $user_min, $user_max) {

            $epi = rand($epi_min, $epi_max);

            $user = rand($user_min, $user_max -1);

            $os->epis()->attach($epi);

            $os->tecnicos()->attach($user);

        });

    }
}
