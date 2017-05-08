<?php

class PlatoSeeder extends DatabaseSeeder
{
    public function run()
    {
        $entrada = TipoPlato::create(['nombre' => 'Entrada'])->id;
        $fondo = TipoPlato::create(['nombre' => 'Fondo'])->id;
        $sopa = TipoPlato::create(['nombre' => 'Sopa'])->id;
        $postre = TipoPlato::create(['nombre' => 'Postre'])->id;

        Plato::create(['nombre'=>'ensalada de palta','tipo_platos_id'=>$entrada]);
        Plato::create(['nombre'=>'tequeños','tipo_platos_id'=>$entrada]);
        Plato::create(['nombre'=>'arroz con pollo','tipo_platos_id'=>$fondo]);
        Plato::create(['nombre'=>'arroz chaufa','tipo_platos_id'=>$fondo]);
        Plato::create(['nombre'=>'sopa de moron','tipo_platos_id'=>$sopa]);
        Plato::create(['nombre'=>'sopa de choro','tipo_platos_id'=>$sopa]);
        Plato::create(['nombre'=>'arroz con leche','tipo_platos_id'=>$postre]);
        Plato::create(['nombre'=>'mazzamorra morada','tipo_platos_id'=>$postre]);
    }
}