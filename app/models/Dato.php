<?php

class Dato extends \Eloquent
{

    protected $table = 'datos';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
