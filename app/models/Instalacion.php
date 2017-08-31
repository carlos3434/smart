<?php

class Instalacion extends \Eloquent
{

    protected $table = 'instalaciones';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
