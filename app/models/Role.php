<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = [
        'nombre',
        'nombre_mostrar',
        'descripcion'
    ];
    public function permissions() {
        return $this->belongsToMany('Permission', 'permission_role');
    }
    //establecemos las relacion de muchos a muchos con el modelo User, ya que un rol 
    //lo pueden tener varios usuarios y un usuario puede tener varios roles
    public function users(){
        return $this->belongsToMany('User');
    }
}