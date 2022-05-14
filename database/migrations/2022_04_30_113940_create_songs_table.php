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
            $table->string('title',250);
            $table->integer('artist', );
            $table->integer('collaboratorArtist');
            $table->integer('album');
            $table->integer('genre');
            $table->integer('year');
            $table->string('file');
            $table->integer('views');
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
