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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('album_id');
            $table->string('caratula');
            $table->integer('year');
            $table->string('file');
            $table->integer('views');

            $table->foreign('artist_id')->references('id')->on('artists')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('album_id')->references('id')->on('albums')
                ->onDelete('cascade')->onUpdate('cascade');

        
            $table->timestamps();
            //nullable() campo con valor nulo
            //after() campo que se va a insertar despues
            //change() modificacion de tabla
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
};
