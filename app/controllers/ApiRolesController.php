<?php

class ApiRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /roles
     * metohd  GET
     * @return Response
     */
    public function index()
    {
        return Response::json(Role::searchPaginateAndOrder());
    }
    /**
     * Show the form for creating a new resource.
     * url     /roles/create
     * metohd  GET
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     * url     /roles
     * metohd  POST
     * @return Response
     */
    public function store()
    {
        //
        return Role::create(Input::all());
    }
    /**
     * Display the specified resource.
     * url     /roles/{id}
     * metohd  GET
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Role::with('permissions')->findOrFail($id);
    }
    /**
     * Show the form for editing the specified resource.
     * url     /roles/{id}/edit
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
     * url     /roles/{id}
     * metohd  PUT/PATCH
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $response = Role::findOrFail($id)->update(Input::all());
        return Response::json($response);
    }


    /**
     * Remove the specified resource from storage.
     * url     /roles/{id}
     * metohd  DELETE
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
    }
}