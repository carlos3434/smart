<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //bloques de mesa
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('mesas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('numero',3);
            //grupo

            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        //
        Schema::create('estado_pedido_plato', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //
        Schema::create('tipo_plato', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('platos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('estado')->default(1)->nullable();

            $table->integer('tipo_plato_id')->unsigned();
            $table->foreign('tipo_plato_id')->references('id')->on('tipo_plato')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('calendarios', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->boolean('feriado');
            $table->timestamps();
            $table->softDeletes();
        });

        // Create table for associating calendarios to platos (Many-to-Many)
        Schema::create('calendario_plato', function (Blueprint $table) {
            $table->integer('calendario_id')->unsigned();
            $table->integer('plato_id')->unsigned();
            $table->integer('stock');
            $table->decimal('precio');

            $table->foreign('calendario_id')->references('id')->on('calendarios')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('plato_id')->references('id')->on('platos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['calendario_id', 'plato_id']);
            $table->softDeletes();
        });

        Schema::create('estado_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->timestamps();
            $table->softDeletes();
        });
/*
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nickname');
            $table->string('address');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('birthdate');
            $table->char('gender');
            $table->integer('group_id')->unsigned();
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });*/

        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);

            $table->integer('estado_pedido_id')->unsigned();
            $table->foreign('estado_pedido_id')->references('id')->on('estado_pedido')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('mesa_id')->unsigned();
            $table->foreign('mesa_id')->references('id')->on('mesas')
                ->onUpdate('cascade')->onDelete('cascade');
            //moso
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        //niño, adulto mayo,etc
        Schema::create('tipo_cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //pedido
        Schema::create('pedido_plato', function (Blueprint $table) {
            $table->increments('id');//PK
            $table->integer('estado_pedido_plato_id')->unsigned();
            $table->integer('pedido_id')->unsigned();
            $table->integer('plato_id')->unsigned();
            $table->string('observacion');

            $table->foreign('pedido_id')->references('id')->on('pedidos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('plato_id')->references('id')->on('platos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('estado_pedido_plato_id')->references('id')->on('estado_pedido_plato')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('tipo_cliente_id')->unsigned();
            $table->foreign('tipo_cliente_id')->references('id')->on('tipo_cliente')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['pedido_id', 'plato_id']);

            $table->timestamps();
            $table->softDeletes();
        });

        // Create table for associating sedes to users (Many-to-Many)
        Schema::create('sede_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('sede_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('sede_id')->references('id')->on('sedes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'sede_id']);
            $table->softDeletes();
        });

        // Create table for associating grupos to users (Many-to-Many)
        Schema::create('grupo_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('grupo_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('grupo_id')->references('id')->on('grupos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'grupo_id']);
            $table->softDeletes();
        });

        //venta
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        //cliente
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname',150);
            $table->string('dni',10);
            $table->string('email',50);
            $table->string('facebook',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //venta detalle
        Schema::create('venta_detalle', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('venta_id')->unsigned();
            $table->foreign('venta_id')->references('id')->on('ventas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')
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
        Schema::drop('venta_detalle');
        Schema::drop('clientes');
        Schema::drop('ventas');
        Schema::drop('grupo_user');
        Schema::drop('sede_user');
        Schema::drop('pedido_plato');
        Schema::drop('tipo_cliente');
        Schema::drop('pedidos');
        //Schema::drop('users');
        Schema::drop('estado_pedido');
        Schema::drop('calendario_plato');
        Schema::drop('calendarios');
        Schema::drop('platos');
        Schema::drop('tipo_plato');
        Schema::drop('estado_pedido_plato');
        Schema::drop('mesas');
        Schema::drop('grupos');
        Schema::drop('sedes');
    }
}
