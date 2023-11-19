<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderlines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('amount')->default(1);
            $table->float('total', 15, 2);
            $table->foreignId('product_id')->constrained();
            $table->foreignId('order_id')->constrained();
            $table->softDeletes();

            //lo pondremos de serie tanto aqui como en la order
            //$table->string('status')->default('pending');
            //$table->string('payment_method')->default('card');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderlines', function(Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['order_id']);
        });
    }
};