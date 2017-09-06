<?php

use Illuminate\Database\Seeder;

class OauthUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\Schneider\OAuthUsp\app\Http\Model\OauthUsers::class, 10)->create();

    }
}
