<?php

class Amasdato extends \Eloquent
{

    protected $table = 'a_masdatos';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
