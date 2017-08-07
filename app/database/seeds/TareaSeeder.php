<?php
 
class TareaSeeder extends DatabaseSeeder
{
    public function run()
    {
        EstadoTarea::create(['nombre'=>'Pendiente']);
        EstadoTarea::create(['nombre'=>'Asignado']);
        EstadoTarea::create(['nombre'=>'Iniciado']);
        EstadoTarea::create(['nombre'=>'No Realizado']);
        EstadoTarea::create(['nombre'=>'Completado']);
        EstadoTarea::create(['nombre'=>'Cancelado']);
        EstadoTarea::create(['nombre'=>'Suspendido']);
        EstadoTarea::create(['nombre'=>'Eliminado']);


        TipoTarea::create(['nombre'=>'Serenazgo']);
        TipoTarea::create(['nombre'=>'Rentas']);
        TipoTarea::create(['nombre'=>'Fiscalizacion']);



        TipoPersona::create(['nombre'=>'Sereno']);
        TipoPersona::create(['nombre'=>'Rentas']);
        TipoPersona::create(['nombre'=>'Fiscalizador']);


        Persona::create(['nombre'=>'Sereno jose','tipo_persona_id'=>1]);
        Persona::create(['nombre'=>'Rentas marcos','tipo_persona_id'=>2]);
        Persona::create(['nombre'=>'Fiscalizador Antonio','tipo_persona_id'=>3]);

      $tarea = [
          "coordx" => -12.115132,
          "coordy" => -77.062628,
          "foto1" => "",
          "foto2" => "",
          "foto3" => "",
          "foto4" => "",
          "foto5" => '',
          "observacion" => 'observacion',
          "estado_tarea_id"    => 1
      ];

      for ($i=0; $i <30 ; $i++) {
        $tarea['codigo'] = 'TEST'.$i;
        $tarea['tipo_tarea_id'] = 1;
        Tarea::create($tarea);
      }
      for ($i=30; $i <60 ; $i++) { 
        $tarea['codigo'] = 'TEST'.$i;
        $tarea['tipo_tarea_id'] = 2;
        Tarea::create($tarea);
      }
      for ($i=60; $i <90 ; $i++) { 
        $tarea['codigo'] = 'TEST'.$i;
        $tarea['tipo_tarea_id'] = 3;
        Tarea::create($tarea);
      }
    }
}