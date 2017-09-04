<?php

class Aautorizacion extends \Eloquent
{

    protected $table = 'a_autorizaciones';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
