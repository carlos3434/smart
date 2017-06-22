<?php

class ApiSubModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /modulos
     * metohd  GET
     * @return Response
     */
    public function index()
    {
        $sumodulos = Modulo::raiz()->with('children');
        //$sumodulosUser = Auth::user()->with('submodulos');
        return Response::json(
            $sumodulos->get()
            //'sumodulosUser'=>$sumodulosUser->get()
        );
    }
    /**
     * Show the form for creating a new resource.
     * url     /modulos/create
     * metohd  GET
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     * url     /modulos
     * metohd  POST
     * @return Response
     */
    public function store()
    {
        //
        return User::create(Input::all());
    }
    /**
     * Display the specified resource.
     * url     /modulos/{id}
     * metohd  GET
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return User::with('roles','modulos')->findOrFail($id);
    }
    /**
     * Show the form for editing the specified resource.
     * url     /modulos/{id}/edit
     * metohd  GET
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     * url     /modulos/{id}
     * metohd  PUT/PATCH
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $response = User::findOrFail($id)->update(Input::all());
        return Response::json($response);
    }


    /**
     * Remove the specified resource from storage.
     * url     /modulos/{id}
     * metohd  DELETE
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
    }
}