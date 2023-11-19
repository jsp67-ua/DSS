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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->decimal('total', 15, 2)->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->string('status')->default('pending');
            $table->string('payment_method')->default('card');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};