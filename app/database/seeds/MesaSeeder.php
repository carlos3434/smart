<?php

class MesaSeeder extends DatabaseSeeder
{
    public function run()
    {
        $grupo= [
            'nombre' => 'San isidro'
        ];
        $grupoId = Grupo::create($grupo)->id;
        
        for ($i=1; $i < 10 ; $i++) {
            $mesa = [
                'nombre' => 'Meza: '.$i,
                'numero' => $i,
                'grupo_id' => $grupoId
            ];
            Mesa::create($mesa);
        }
    }
}