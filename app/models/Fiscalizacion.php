<?php

class Fiscalizacion extends \Eloquent
{
    use DataViewer,SoftDeletingTrait;

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
        return $this->hasMany('Dato');
    }


    public function scopePropietario($query){
        return $query->leftjoin('propietarios as p', 'fiscalizaciones.id', '=', 'p.fiscalizacion_id');

    }
    public function scopeDomicilio($query){
        return $query->leftjoin('domicilios as d', 'fiscalizaciones.id', '=', 'd.fiscalizacion_id');
    }
    public function scopePrediouno($query){
        return $query->leftjoin('prediouno as pu', 'fiscalizaciones.id', '=', 'pu.fiscalizacion_id');
    }
    public function scopePrediodos($query){
        return $query->leftjoin('prediodos as pd', 'fiscalizaciones.id', '=', 'pd.fiscalizacion_id');
    }
    public function scopePrediotres($query){
        return $query->leftjoin('prediotres as pt', 'fiscalizaciones.id', '=', 'pt.fiscalizacion_id');
    }
    public function scopeConstruccion($query){
        return $query->leftjoin('construcciones as c', 'fiscalizaciones.id', '=', 'c.fiscalizacion_id');
    }
    public function scopeInstalacion($query){
        return $query->leftjoin('instalaciones as i', 'fiscalizaciones.id', '=', 'i.fiscalizacion_id');
    }
    public function scopeDatos($query){
        return $query->leftjoin('datos as d', 'fiscalizaciones.id', '=', 'd.fiscalizacion_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }
}
