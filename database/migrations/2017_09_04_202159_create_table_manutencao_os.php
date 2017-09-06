<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManutencaoOs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencao_os', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('solicitacao_id')->unsigned();
            $table->string('status');
            $table->longText('descricao');
            $table->longText('relatorio');
            $table->date('data_inicio')->nullable();
            $table->date('data_termino')->nullable();
            $table->timestamps();
            $table->foreign('solicitacao_id')->references('id')->on('manutencao_solicitacoes')->onDelete('CASCADE');
            $table->integer('gestor_id')->unsigned()->nullable();
            $table->foreign('gestor_id')->references('id')->on('oauth_users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutencao_os');
    }
}
