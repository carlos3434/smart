<?php

class Ubicacion extends \Eloquent
{

    protected $table = 'ubicaciones';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
