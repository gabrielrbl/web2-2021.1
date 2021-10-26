<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string("nome_produto");
            $table->decimal("icms", 7,2)->default(0.0);
            $table->decimal("ipi", 7,2)->default(0.0);
            $table->decimal("frete", 7,2)->default(0);
            $table->decimal("acrescimo_despesas", 7,2)->default(0);
            $table->decimal("preco_na_fabrica", 7,2)->default(0);
            $table->decimal("preco_compra", 7,2)->default(0);
            $table->decimal("preco_venda", 7,2)->default(0);
            $table->decimal("lucro", 7,2)->default(0);
            $table->integer("quantidade");
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
        Schema::dropIfExists('produto');
    }
}
