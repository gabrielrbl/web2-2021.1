<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
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
            $table->string('nome', 100);
            $table->decimal('icms', 7, 2)->default(0);
            $table->decimal('ipi', 7, 2)->default(0);
            $table->decimal('frete', 7, 2)->default(0);
            $table->decimal('precofabrica', 7, 2)->default(0);
            $table->decimal('precocompra', 7, 2)->default(0);
            $table->decimal('precovenda', 7, 2)->default(0);
            $table->decimal('lucro', 7, 2)->default(0);
            $table->decimal('desconto', 7, 2)->default(0);
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
        Schema::dropIfExists('produtos');
    }
}
