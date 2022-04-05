<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->get();

        return response()->json([
            'success'=> true,
            'message'=> 'Data daftar role berhasil ditampilkan',
            'data'=> $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestAll = $request->all();

        $validator = FacadesValidator::make( $requestAll , [
            'name' => 'required',
        ]);



        if($validator->fails()) {
            return response()->json( $validator->errors() ,400);
        }

        $role = Role::create($requestAll);

        return response()->json([
            'success'=> true,
            'message'=> 'Data role berhasil ditambahkan',
            'data'=> $role
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find role by ID
        $role = Role::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
             'message' => 'Detail Data Role',
            'data'    => $role
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Role $role)
    {
        //set validation
        $validator = FacadesValidator::make($request->all(), [
            'name'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find role by ID
        $role = Role::findOrFail($role->id);

        if($role) {

            //update role
            $role->update([
                'name'     => $request->name
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Role Updated',
                'data'    => $role
            ], 200);

        }

        //data role not found
        return response()->json([
            'success' => false,
            'message' => 'Role Not Found',
        ], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //find role by ID
    $role = Role::findOrfail($id);

    if($role) {

        //delete role
        $role->delete();

        return response()->json([
            'success' => true,
            'message' => 'Role Deleted',
        ], 200);

    }

    //data role not found
    return response()->json([
        'success' => false,
        'message' => 'Role Not Found',
    ], 404);
    }
}
