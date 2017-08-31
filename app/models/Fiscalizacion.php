<?php

class Fiscalizacion extends \Eloquent
{

    protected $table = 'fiscalizaciones';
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $guarded =[];
/*
    public function imagenes()
    {
        return $this->hasMany('Imagen');
    }*/
    public function propietarios()
    {
        return $this->hasMany('Propietario');
    }
    public function domicilios()
    {
        return $this->hasMany('Domicilio');
    }
    public function prediouno()
    {
        return $this->hasMany('Prediouno');
    }
    public function prediodos()
    {
        return $this->hasMany('Prediodos');
    }
    public function prediotres()
    {
        return $this->hasMany('Prediotres');
    }
    public function construcciones()
    {
        return $this->hasMany('Construccion');
    }
    public function instalaciones()
    {
        return $this->hasMany('Instalacion');
    }
    public function datos()
    {
        return $this->hasMany('Datos');
    }
}
