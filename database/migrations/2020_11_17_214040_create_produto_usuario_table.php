<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_produto');
            $table->unsignedBigInteger('fk_id_user');
            $table->timestamps();


            $table->foreign('fk_id_produto')->references('id')->on('produtos');
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
        Schema::dropIfExists('produto_usuario');
    }
}
