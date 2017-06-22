<?php

class Modulo extends Eloquent
{
    use DataViewer;

    protected $fillable = [
        'nombre',
        'url',
        'icon'
    ];
    /**
     * Submodulos
     */
    public function scopeRaiz($query)
    {
        return $query->whereNull('modulo_id');
    }
    /**
     * Submodulos relationship
     */
    public function scopeChild($query)
    {
        return $query->whereNotNull('modulo_id');
    }

    /**
     * Usuarios relationship
     */
    /*
    public function user()
    {
        return $this->belongsToMany('User');
    }*/
    /**
     * Permisos relationship
     */
    public function permiso()
    {
        return $this->hasMany('Permission');
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