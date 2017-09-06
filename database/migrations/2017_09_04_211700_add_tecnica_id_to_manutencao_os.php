<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTecnicaIdToManutencaoOs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('manutencao_os', function (Blueprint $table){

            $table->integer('tecnica_id')->unsigned()->nullable();
            $table->foreign('tecnica_id')->references('id')->on('manutencao_tecnicas')->onDelete('set null');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
