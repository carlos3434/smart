<?php

class Adocumento extends \Eloquent
{

    protected $table = 'a_documentos';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
