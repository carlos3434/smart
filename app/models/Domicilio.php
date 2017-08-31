<?php

class Domicilio extends \Eloquent
{

    protected $table = 'domicilios';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
