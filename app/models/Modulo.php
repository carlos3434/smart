<?php

class Modulo extends Eloquent
{
    //use DataViewer;
    /**
     * Submodulos relationship
     */
    public function scopeRaiz($query)
    {
        return $query->whereNull('modulo_id');
    }

    /**
     * Usuarios relationship
     */
    public function user()
    {
        return $this->belongsToMany('User');
    }

    public function parent()
    {
        return $this->belongsTo('Modulo', 'modulo_id');
    }

    public function children()
    {
        return $this->hasMany('Modulo', 'modulo_id');
    }

}