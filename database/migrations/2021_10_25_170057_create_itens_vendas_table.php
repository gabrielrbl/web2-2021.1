<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idproduto');
            $table->foreign('idproduto')->references('id')->on('produtos')->onDelete('cascade');
            $table->unsignedBigInteger('idvenda');
            $table->foreign('idvenda')->references('id')->on('vendas')->onDelete('cascade');
            $table->decimal('valorunitario', 7, 2)->default(0);
            $table->integer('quantidade')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_vendas');
    }
}
