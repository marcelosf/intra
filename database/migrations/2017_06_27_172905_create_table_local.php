<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLocal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('build', 20);
            $table->string('floor', 20);
            $table->string('name', 128);
            $table->string('type', 128);
            $table->string('department', 128)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local');
    }
}
