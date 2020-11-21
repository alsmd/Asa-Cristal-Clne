<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->text('conteudo');
            $table->string('autor');
            $table->unsignedBigInteger('fk_id_postagem');
            $table->unsignedBigInteger('fk_id_user');
            $table->timestamps();

            $table->foreign('fk_id_postagem')->references('id')->on('postagens');
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
        Schema::dropIfExists('comentarios');
    }
}
