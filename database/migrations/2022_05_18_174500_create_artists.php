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
        Schema::create('artists', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->integer('debutYear');
            $table->unsignedBigInteger('genre_id');

            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->longText('bio');
            $table->string('image');
            $table->string('image_banner');
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
        Schema::dropIfExists('artists');
    }
};
