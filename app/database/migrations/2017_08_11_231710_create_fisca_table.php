<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiscaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('fiscalizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ubicacion',50)->nullable();
            $table->string('fichaNro',50)->nullable();
            $table->string('observaciones',50)->nullable();
            $table->string('ape_nom',50)->nullable();
            $table->string('dni',50)->nullable();
            $table->string('Email',50)->nullable();
            $table->string('EmployeeNumber',50)->nullable();
            $table->string('FirstName',50)->nullable();
            $table->string('GroupName',50)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        //1
        Schema::create('propietarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',50);
            $table->string('tipo_doc',50);
            $table->string('num_doc',50);
            $table->string('ape_nombres',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });


        //2
        Schema::create('domicilios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_postal',50);
            $table->string('distrito',50);
            $table->string('cod_urbano',50);
            $table->string('conjunto_urbano',50);
            $table->string('cod_via',50);
            $table->string('via',50);
            $table->string('num_municipal',50);
            $table->string('departamento',50);
            $table->string('manzana',50);
            $table->string('lote',50);
            $table->string('telefono',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });


        //3
        Schema::create('prediouno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_predio',50);
            $table->string('departamento',50);
            $table->string('provincia',50);
            $table->string('distrito',50);
            $table->string('sector',50);
            $table->string('manzana',50);
            $table->string('lote',50);
            $table->string('edifica',50);
            $table->string('entrada',50);
            $table->string('peso',50);
            $table->string('unidad',50);
            $table->string('dc',50);
            $table->string('cod_uso',50);
            $table->string('uso_propiedad',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        //3
        Schema::create('prediodos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_urbano',50);
            $table->string('centro_poblado',50);
            $table->string('desc_centro_poblado',50);
            $table->string('cod_via',50);
            $table->string('via',50);
            $table->string('numero',50);
            $table->string('block',50);
            $table->string('manzana',50);
            $table->string('lote',50);
            $table->string('sublote',50);
            $table->string('fecha_compra',50);
            $table->string('fecha_exon',50);
            $table->string('num_resolucion_municipal',50);
            $table->string('condicion',50);
            $table->string('desc_condicion',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });


        //3
        Schema::create('prediotres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sum_luz',50);
            $table->string('sum_agua',50);
            $table->string('area_terreno_cecla',50);
            $table->string('area_terreno_verifica',50);
            $table->string('area_terreno_comun',50);
            $table->string('area_terreno_propia',50);
            $table->string('longitud_fachada',50);
            $table->string('ubicacion_parques',50);
            $table->string('clasificacion_predio',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        //3
        Schema::create('construcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('piso',50);
            $table->string('fecha_construccion',50);
            $table->string('materiales_construccion',50);
            $table->string('estado_conservacion',50);
            $table->string('estado_construccion',50);
            $table->string('muros_columnas',50);
            $table->string('techos',50);
            $table->string('pisos',50);
            $table->string('puertas_ventanas',50);
            $table->string('revestimientos',50);
            $table->string('banios',50);
            $table->string('instalaciones_electricas',50);
            $table->string('area_construida_declarada',50);
            $table->string('area_construida_verificada',50);
            $table->string('uca',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        //3
        Schema::create('instalaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',50);
            $table->string('desc_instalacion',50);
            $table->string('fecha_termino',50);
            $table->string('unidad_medida',50);
            $table->string('material_predominante',50);
            $table->string('estado_conservacion',50);
            $table->string('largo',50);
            $table->string('ancho',50);
            $table->string('alto',50);
            $table->string('total',50);
            $table->string('valor_soles',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        //3
        Schema::create('datos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',50);
            $table->string('codigo_contribuyente',50);
            $table->string('num_doc_identidad',50);
            $table->string('ape_nom_razon_social_condominio',50);
            $table->string('domicilio_fiscal',50);
            $table->string('porcentaje_condominio',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
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
        //Schema::dropIfExists('tareas');
        //Schema::dropIfExists('estado_tareas');
    }
}
