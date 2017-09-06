<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManutencaoOsTecnico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencao_os_tecnico', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('os_id')->unsigned();
            $table->foreign('os_id')->references('id')->on('manutencao_os');
            $table->integer('tecnico_id')->unsigned();
            $table->foreign('tecnico_id')->references('id')->on('oauth_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutencao_os_tecnico');
    }
}
