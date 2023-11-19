<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_lines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('amount')->default(1); //Cantidad del mismo producto de la línea.
            $table->decimal('total',15,2)->default(0); //Total de la línea de carrito.
            $table->foreignId('product_id')->constrained(); //Clave ajena hacia la tabla producto.
            $table->foreignId('cart_id')->constrained(); //Clave ajena hacia la tabla carrito.
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_lines', function(Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['cart_id']);
        });
    }
};
