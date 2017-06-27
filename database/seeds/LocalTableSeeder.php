<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('local')->truncate();

        factory(Intranet\Model\Local\Local::class, 10)->create();

    }
}
