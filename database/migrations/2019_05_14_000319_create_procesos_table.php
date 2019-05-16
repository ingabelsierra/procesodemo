<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
			$table->string('numero');
			$table->integer('estado');
			$table->string('descripcion');
			$table->date('fechaInicio')->nullable();
			$table->date('fechaFin')->nullable();
			$table->string('departamento');
			$table->string('municipio');
			$table->boolean('aprobado');
			$table->string('comentarios');
			$table->integer('id_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procesos');
    }
}
