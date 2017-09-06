<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMantencaoEpisOss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencao_epis_oss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('epi_id')->unsigned();
            $table->integer('os_id')->unsigned();
            $table->timestamps();
            $table->foreign('epi_id')->references('id')->on('epi')->onDelete('cascade');
            $table->foreign('os_id')->references('id')->on('manutencao_os')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutencao_epis_oss');
    }
}
