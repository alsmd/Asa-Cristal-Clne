<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagem', function (Blueprint $table) {
            $table->id();
            $table->string('mensagem');
            $table->string('status')->default('nlido');
            $table->unsignedBigInteger('fk_id_chat');
            $table->unsignedBigInteger('fk_id_user');

            $table->timestamps();
            $table->foreign('fk_id_chat')->references('id')->on('chat');
            $table->foreign('fk_id_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensagem');
    }
}
