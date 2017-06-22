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
        return $query->whereNotNull('s.modulo_id');
    }

    /**
     * Scope para obtener  movimiento.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJoinParent($query)
    {
        return $query->join(
            'modulos as m',
            'm.id',
            '=',
            's.modulo_id'
        );
    }
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