<?php

class Prediodos extends \Eloquent
{

    protected $table = 'prediodos';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
