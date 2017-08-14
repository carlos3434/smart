<?php

class ApiTareasController extends Controller
{

    public function index()
    {
        $tareas = Tarea::tipoEstado()
                ->estadoTarea()
                ->trabajador()
                ->select(
                    'tareas.*', 'tt.nombre as tipo', 'et.nombre as estado',
                    't.EmployeeNumber','t.nombres as trabajador'
                )
                ->searchPaginateAndOrder();

        return Response::json($tareas);
    }

    public function create()
    {

    }

    public function store()
    {
        $user = Tarea::create(Input::all());
        
        if (!is_null($user)) {
            //enviar a officetrack
            $dueDate = date("YmdHis", strtotime("2017-08-10 23:59:59"));

            $trama['TaskNumber'] = Input::get('TaskNumber');
            $trama['EmployeeNumber'] = Input::get('EmployeeNumber');
            $trama['DueDateAsYYYYMMDDHHMMSS'] = $dueDate;
            $trama['Duration'] = 0.75;
            $trama['Notes'] = "";
            $trama['Description']=Input::get('Description');

            $trama['CustomerName'] = '/ DELGADO DE LA FLOR DE PIEROLA, MONICA CECILIA';
            $trama['Location'] = [
                "East"      => Input::get('coordx'),//lng X
                "North"     => Input::get('coordy'),//lat Y
                "Address"   => 'AV LA MERCED 625 UR UR MONTAGNE, Piso: 1 Int: 102 Mzn:  Lt: '
            ];
            $ot = new Officetrack;
            $response = $ot->envio($trama);
            if($response->CreateOrUpdateTaskResult=='OK'){
                
                return Response::json("ok");
            }
        }
        return $user;
    }

    public function show($id)
    {
        return Tarea::with('movimientos')->findOrFail($id);
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
        $role = Tarea::findOrFail($id);
        $respuestaUpdate = $role->update(Input::all());

        return Response::json($respuestaUpdate);
    }

    public function destroy($id)
    {
        Tarea::findOrFail($id)->delete();
    }
}