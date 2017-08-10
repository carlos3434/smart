<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Tarea extends Eloquent
{
    use DataViewer,SoftDeletingTrait;

    public function scopeTipoEstado($query){
        return $query->join('tipo_tareas as t', 'tareas.tipo_tarea_id', '=', 't.id')
                    ->join('estado_tareas as e', 'tareas.estado_tarea_id', '=', 'e.id')
                    ->select('tareas.*', 't.nombre as tipo', 'e.nombre as estado');
    }
}