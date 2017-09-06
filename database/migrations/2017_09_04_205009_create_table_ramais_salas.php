<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRamaisSalas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ramais_salas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sala_id')->unsigned();
            $table->integer('ramal_id')->unsigned();
            $table->foreign('sala_id')
                ->references('id')
                ->on('local')
                ->onDelete('cascade');
            $table->foreign('ramal_id')
                ->references('id')
                ->on('ramais')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ramais_salas');
    }
}
