<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tipo_personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);

            $table->integer('tipo_persona_id')->unsigned();
            $table->foreign('tipo_persona_id')->references('id')->on('tipo_personas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tipo_tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //bloques de mesa
        Schema::create('estado_tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',50);
            $table->string('coordx',50);
            $table->string('coordy',50);
            $table->string('foto1',50);
            $table->string('foto2',50);
            $table->string('foto3',50);
            $table->string('foto4',50);
            $table->string('foto5',50);
            $table->string('observacion',50);

            $table->integer('tipo_tarea_id')->unsigned();
            $table->foreign('tipo_tarea_id')->references('id')->on('tipo_tareas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('estado_tarea_id')->unsigned();
            $table->foreign('estado_tarea_id')->references('id')->on('estado_tareas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
        Schema::dropIfExists('estado_tareas');
        Schema::dropIfExists('tipo_tareas');
        Schema::dropIfExists('personas');
        Schema::dropIfExists('tipo_personas');
    }
}
