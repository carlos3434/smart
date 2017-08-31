<?php

class Propietario extends \Eloquent
{

    protected $table = 'propietarios';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
