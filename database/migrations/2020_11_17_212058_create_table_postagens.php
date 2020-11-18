<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePostagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagens', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('conteudo');
            $table->string('autor');
            $table->unsignedBigInteger('fk_id_categoria');
            $table->unsignedBigInteger('fk_id_forum');
            $table->unsignedBigInteger('fk_id_user');
            $table->timestamps();

            $table->foreign('fk_id_categoria')->references('id')->on('categorias');
            $table->foreign('fk_id_forum')->references('id')->on('forum');
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
        Schema::dropIfExists('postagens');
    }
}