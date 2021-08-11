<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('IdTipo');
            $table->foreign('IdTipo')->references('id')->on('tipos');
            $table->unsignedBigInteger('IdInstitucion');
            $table->foreign('IdInstitucion')->references('id')->on('institucions');
            $table->string('Titulo',100);
            $table->mediumText('Descripcion');
            //JSON con fechas de cuando puede ser el evento. Puede venir nulo
            $table->string('Cuando',200)->nullable();
            //Fecha desde cuando se va a mostrar la publicación
            $table->dateTime('FechaMostrar',0)->nullable();
            //Fecha desde cuando deja de mostrarse la publicación.
            $table->dateTime('FechaOcultar',0)->nullable();
            $table->boolean('Gratis');
            $table->string('Foto');
            
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
        Schema::dropIfExists('eventos');
    }
}
