<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('formularios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Form',50);
            $table->string('Version',50);
            $table->string('Fields',50);
            $table->string('EntryDate',50);
            $table->string('Data',50);
            $table->string('EventDate',50);
            $table->string('EntryType',50);
            $table->string('EntrySource',50);
            $table->string('X',50);
            $table->string('Y',50);
            $table->string('Address',50);
            $table->string('MSISDN',50);
            $table->string('Date',50);
            $table->string('DateAge',50);
            $table->string('DateFromEpoch',50);
            $table->string('TaskNumber',50);
            $table->string('Status',50);
            $table->string('Description',50);
            $table->string('CustomerName',50);

            $table->string('Data2',50);
            $table->string('Data3',50);
            $table->string('Data4',50);
            $table->string('Data6',50);
            $table->string('Data7',50);
            $table->string('Data8',50);
            $table->string('Data9',50);
            $table->string('Data10',50);
            $table->string('Data11',50);
            $table->string('Data13',50);
            $table->string('Data14',50);
            $table->string('Data15',50);
            $table->string('Data16',50);
            $table->string('Data17',50);
            $table->string('Data19',50);
            $table->string('Data21',50);
            $table->string('Data23',50);
            $table->string('Data24',50);
            $table->string('Data25',50);
            $table->string('Data28',50);
            $table->string('Data30',50);
            $table->string('StartDate',50);
            $table->string('StartDateAge',50);
            $table->string('FirstName',50);
            $table->string('LastName',50);
            $table->string('EmployeeNumber',50);
            $table->string('GroupName',50);


            $table->integer('movimiento_id')->unsigned();
            $table->foreign('movimiento_id')->references('id')->on('movimientos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url',50);

            $table->integer('formulario_id')->unsigned();
            $table->foreign('formulario_id')->references('id')->on('formularios')
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
    }
}
