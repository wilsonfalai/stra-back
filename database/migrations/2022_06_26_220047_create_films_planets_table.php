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
        Schema::create('films_planets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('film_id');
            $table->foreign('film_id')
              ->references('id')
              ->on('films')->onDelete('cascade');

            $table->unsignedBigInteger('planet_id');
            $table->foreign('planet_id')
              ->references('id')
              ->on('planets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films_planets');
    }
};
