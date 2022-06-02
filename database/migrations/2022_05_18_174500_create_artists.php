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
            $table->unsignedBigInteger('country_id');
            $table->longText('bio');
            $table->string('image');
            $table->string('image_banner');

            $table->timestamps();

            $table->foreign('genre_id')->references('id')
            ->on('genres')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('country_id')->references('id')
            ->on('countries')->onDelete('cascade')
            ->onUpdate('cascade');
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
