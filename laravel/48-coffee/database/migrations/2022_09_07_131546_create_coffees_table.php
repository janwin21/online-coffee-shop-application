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
        Schema::create('coffees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coffee_type_id');
            $table->string('coffee_name');
            $table->double('price', 8, 2);
            $table->integer('available');
            $table->string('image_path');
            $table->string('short')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->foreign('coffee_type_id')->references('id')->on('coffee_types')->onDelete('cascade');
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
        Schema::dropIfExists('coffees');
    }
};
