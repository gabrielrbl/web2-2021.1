<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_entrada', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produto');
            $table->unsignedBigInteger('id_entrada');
            $table->decimal("ipi",7,2)->default(0);
            $table->decimal("frete",7,2)->default(0);
            $table->decimal("icms",7,2)->default(0);
            $table->decimal("preco_compra",7,2)->default(0);
            $table->integer('quantidade');
            $table->timestamps();

            $table->foreign('id_produto')->references('id')->on('produto')->onDelete("cascade");
            $table->foreign('id_entrada')->references('id')->on('entrada')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_entrada');
    }
}
