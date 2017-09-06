<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManutencaoSolicitacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencao_solicitacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('codigo');
            $table->integer('local_id')->unsigned()->nullable();
            $table->foreign('local_id')->references('id')->on('local')->onDelete('set null');
            $table->longText('descricao');
            $table->string('status');
            $table->integer('solicitante_id')->unsigned()->nullable();
            $table->integer('responsavel_id')->unsigned()->nullable();
            $table->foreign('solicitante_id')->references('id')->on('oauth_users')->onDelete('set null');
            $table->foreign('responsavel_id')->references('id')->on('oauth_users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutencao_solicitacoes');
    }
}
