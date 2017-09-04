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
            
            $table->string('ficha_p',50)->nullable();
            $table->string('codigo_p',50)->nullable();
            $table->string('ubica',50)->nullable();
            $table->string('x',50)->nullable();
            $table->string('y',50)->nullable();
            $table->string('foto1',50)->nullable();
            $table->string('foto2',50)->nullable();
            $table->string('foto3',50)->nullable();
            $table->string('foto4',50)->nullable();
            $table->string('observaciones',50)->nullable();
            $table->string('anexo01_p_anexo',50)->nullable();
            $table->string('anexo02_p_anexo',50)->nullable();
            $table->string('firma_declarante',50)->nullable();
            $table->string('nombres_declarantes',50)->nullable();
            $table->string('dni_declarantes',50)->nullable();
            $table->string('firma_propietario',50)->nullable();
            $table->string('nombres_propietarios',50)->nullable();
            $table->string('dni_propietario',50)->nullable();
            $table->string('firma_fiscalizador',50)->nullable();
            $table->string('nombres_fiscalizador',50)->nullable();
            $table->string('dni_fiscalizador',50)->nullable();

            $table->string('EmployeeNumber',50)->nullable();
            $table->string('FirstName',50)->nullable();
            $table->string('GroupName',50)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        //1
        Schema::create('propietarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_documento',50);
            $table->string('numero_documento',50);
            $table->string('nombres',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });


        //2
        Schema::create('domicilios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postal',50);
            $table->string('distrito',50);
            $table->string('codigo_via',50);
            $table->string('via',50);
            $table->string('nombre_via',50);
            $table->string('numero_monicipal',50);
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
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_uso',50);
            $table->string('uso_propiedad',50);
            $table->string('codigo_urbano',50);
            $table->string('cod_centro_poblado',50);
            $table->string('desc_centro_poblado',50);
            $table->string('cod_via',50);
            $table->string('via',50);
            $table->string('nombre_via',50);
            $table->string('numero',50);
            $table->string('block',50);
            $table->string('departamento',50);
            $table->string('manzana',50);
            $table->string('lote',50);
            $table->string('sublote',50);
            $table->string('area_declarada',50);
            $table->string('area_verificada',50);
            $table->string('area_comun',50);
            $table->string('area_propia',50);
            $table->string('longitud_fachada',50);
            $table->string('ubicacion',50);
            $table->string('clasificacion',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        //4
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

        //5
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

        //6
        Schema::create('datos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',50);
            $table->string('codigo_contribuyente',50);
            $table->string('num_doc_identidad',50);
            $table->string('nombres',50);
            $table->string('domicilio_fiscal',50);
            $table->string('porcentaje_condominio',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        
        Schema::create('anexos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('descripcion',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //anexos
        Schema::create('a_autorizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',50);
            $table->string('descripcion',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('anexo_id')->unsigned();
            $table->foreign('anexo_id')->references('id')->on('anexos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('a_ubicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('autorizada',50);
            $table->string('verficada',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('anexo_id')->unsigned();
            $table->foreign('anexo_id')->references('id')->on('anexos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('a_masdatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('expediente',50);
            $table->string('licencia',50);
            $table->string('expedicion',50);
            $table->string('vencimiento',50);
            $table->string('actividad',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('anexo_id')->unsigned();
            $table->foreign('anexo_id')->references('id')->on('anexos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('a_anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',50);
            $table->string('descripcion',50);
            $table->string('lados',50);
            $table->string('autor',50);
            $table->string('verificacion',50);
            $table->string('expediente',50);
            $table->string('licencia',50);
            $table->string('expedicion',50);
            $table->string('vencimiento',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('anexo_id')->unsigned();
            $table->foreign('anexo_id')->references('id')->on('anexos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('a_biencomun', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',50);
            $table->string('descripcion',50);
            $table->string('titulo',50);
            $table->string('verificada',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('anexo_id')->unsigned();
            $table->foreign('anexo_id')->references('id')->on('anexos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('a_comunes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('piso',50);
            $table->string('construccion',50);
            $table->string('material',50);
            $table->string('conservacion',50);
            $table->string('estado',50);
            $table->string('muros',50);
            $table->string('techos',50);
            $table->string('pisos',50);
            $table->string('puertas',50);
            $table->string('revestimiento',50);
            $table->string('banios',50);
            $table->string('electricas',50);
            $table->string('declarada',50);
            $table->string('verificada',50);
            $table->string('uca',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('anexo_id')->unsigned();
            $table->foreign('anexo_id')->references('id')->on('anexos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('a_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',50);
            
            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('anexo_id')->unsigned();
            $table->foreign('anexo_id')->references('id')->on('anexos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('a_propietarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('propietario',50);

            $table->integer('fiscalizacion_id')->unsigned();
            $table->foreign('fiscalizacion_id')->references('id')->on('fiscalizaciones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('anexo_id')->unsigned();
            $table->foreign('anexo_id')->references('id')->on('anexos')
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
