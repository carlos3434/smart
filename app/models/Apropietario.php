<?php

class Apropietario extends \Eloquent
{

    protected $table = 'a_propietarios';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
