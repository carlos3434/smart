<?php

class Tarea extends Eloquent
{
    use DataViewer;
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $table = 'tareas';
    
    public function movimientos()
    {
        return $this->hasMany('Movimiento');
    }
}