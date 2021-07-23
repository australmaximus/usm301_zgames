<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaJuegos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            //1. Definir los campos de la tabla juegos
            $table->string("nombre",100);
            $table->string("descripcion",200);
            $table->tinyInteger("apto_ninios")->default(0); //no apto para niños
            $table->integer("precio")->unsigned();
            $table->date("fecha_lanzamiento"); // useCurrent() tomar fecha actual si el usuario no pone nada
            //2. Agregar la columna de la foranea
            //Las claves primarias de laravel (id) por defecto son bigInteger y unsigned
            $table->bigInteger("consola_id")->unsigned();
            //3. Agregar la relacion
            //ALTER TABLE ADD CONSTRAINT FOREIGN KEY BLA BLA B
            $table->foreign("consola_id")->references("id")->on("consolas")->onDelete("cascade");
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
        Schema::dropIfExists('juegos');
    }
}
