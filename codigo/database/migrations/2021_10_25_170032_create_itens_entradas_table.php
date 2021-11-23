<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idproduto');
            $table->foreign('idproduto')->references('id')->on('produtos')->onDelete('cascade');
            $table->unsignedBigInteger('identrada');
            $table->foreign('identrada')->references('id')->on('entradas')->onDelete('cascade');
            $table->decimal('icms', 7, 2)->default(0);
            $table->decimal('ipi', 7, 2)->default(0);
            $table->decimal('frete', 7, 2)->default(0);
            $table->decimal('precocompra', 7, 2)->default(0);
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
        Schema::dropIfExists('itens_entradas');
    }
}
