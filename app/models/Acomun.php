<?php

class Acomun extends \Eloquent
{

    protected $table = 'a_comunes';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
