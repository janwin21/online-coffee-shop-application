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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('costumer_id');
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->unsignedBigInteger('coffee_id');
            $table->string('service_type');
            $table->string('coffee_name');
            $table->string('coffee_type');
            $table->tinyInteger('coffee_quantity');
            $table->foreign('costumer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('coffee_id')->references('id')->on('coffees')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};
