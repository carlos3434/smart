<?php

class ApiFiscalizacionesController extends Controller
{

    public function index()
    {
        $tareas = Fiscalizacion::searchPaginateAndOrder();

        return Response::json($tareas);
    }

    public function create()
    {

    }

    public function store()
    {
        $user = Tarea::create(Input::all());
        if (!is_null($user)) {
            $mov = new Movimiento(Input::all());
            $user->movimientos()->save($mov);
            $trama['TaskNumber'] = Input::get('TaskNumber');
            $trama['EmployeeNumber'] = Input::get('EmployeeNumber');
            $trama['DueDateAsYYYYMMDDHHMMSS'] = date("YmdHis",strtotime(Input::get('DueDate')));
            $trama['Duration'] = 0.75;
            $trama['Notes'] = "";
            $trama['Description']=Input::get('Description');
            $trama['CustomerName'] = Input::get('CustomerName');
            $trama['Location'] = [
                "East"      => Input::get('coordx'),//lng X
                "North"     => Input::get('coordy'),//lat Y
                "Address"   => Input::get('Address')
            ];
            $ot = new Officetrack;
            $response = $ot->envio($trama);
            if($response->CreateOrUpdateTaskResult=='OK'){
                
                return Response::json("ok");
            } else {
                return Response::json("no ok");
            }
        }
        return $user;
    }

    public function show($id)
    {
        return Fiscalizacion::with(
            'propietarios',
            'domicilios',
            'ubicaciones',
            'construcciones',
            'instalaciones',
            'datos',
            'a_autorizaciones',
            'a_ubicaciones',
            'a_masdatos',
            'a_anuncios',
            'a_biencomun',
            'a_comunes',
            'a_documentos',
            'a_propietarios',
            'imagenes'
            )->findOrFail($id);
        //return Tarea::with('movimientos')->findOrFail($id);
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