<?php

class ImagenFiscalizacion extends \Eloquent
{

    protected $table = 'imagenes_fiscalizacion';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
