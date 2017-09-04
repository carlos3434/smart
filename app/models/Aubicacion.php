<?php

class Aubicacion extends \Eloquent
{

    protected $table = 'a_ubicaciones';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
