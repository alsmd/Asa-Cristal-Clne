<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_produto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_categoria_para_produto');
            $table->unsignedBigInteger('fk_id_produto');
            $table->timestamps();
            $table->foreign('fk_id_categoria_para_produto')->references('id')->on('categoria_para_produto');
            $table->foreign('fk_id_produto')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_produto');
    }
}
