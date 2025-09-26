<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = User::get(["id", "name", "email"]);
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = User::find($id);
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return response()->json(null, 204);
    }
    public function store(Request $request)
    {
        //validacion
        $data = User::create($request->all());
        return response()->json($data, 201);
    }
    

    public function update(Request $request, $id)
    {
        
        //validacion
        $data = User::find($id);
        $data->fill($request->all());
        $data->save();
        return response()->json($data, 200);
    }
}
