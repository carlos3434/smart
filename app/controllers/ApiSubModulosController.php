<?php

class ApiSubModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /api/submodulos
     * metohd  GET
     * @return Response
     */
    public function index()
    {
        $modulos = Modulo::first()->parent();
        //dd($modulos->parent());
        return Response::json(
            $modulos
        );
    }
    /**
     * Show the form for creating a new resource.
     * url     /api/submodulos/create
     * metohd  GET
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     * url     /api/submodulos
     * metohd  POST
     * @return Response
     */
    public function store()
    {
        //
        return Modulo::create(Input::all());
    }
    /**
     * Display the specified resource.
     * url     /api/submodulos/{id}
     * metohd  GET
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Modulo::findOrFail($id);
    }
    /**
     * Show the form for editing the specified resource.
     * url     /api/submodulos/{id}/edit
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
     * url     /api/submodulos/{id}
     * metohd  PUT/PATCH
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $response = Modulo::findOrFail($id)->update(Input::all());
        return Response::json($response);
    }


    /**
     * Remove the specified resource from storage.
     * url     /api/submodulos/{id}
     * metohd  DELETE
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Modulo::findOrFail($id)->delete();
    }
}