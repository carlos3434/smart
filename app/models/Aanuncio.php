<?php

class Aanuncio extends \Eloquent
{

    protected $table = 'a_anuncios';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
