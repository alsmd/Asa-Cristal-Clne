<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('valor',10,2);
            $table->string('descricao');
            $table->text('corpo')->nullable();;
            $table->string('moeda_utilizada');
            $table->string('slug');
            $table->timestamps();
            $table->unsignedBigInteger('fk_id_jogo');


            $table->foreign('fk_id_jogo')->references('id')->on('jogos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
