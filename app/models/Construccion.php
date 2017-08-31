<?php

class Construccion extends \Eloquent
{

    protected $table = 'construcciones';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
