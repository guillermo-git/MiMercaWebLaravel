<?php

namespace App\Http\Controllers\Api\User\Producto;

use App\Http\Controllers\Controller;
use App\Models\DetalleProducto;
use Illuminate\Http\Request;

class DetalleProductoController extends Controller
{
    
            /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DetalleProducto::get(["id", "nombre", "descripcion","categoria"]);
        return response()->json($data, 200);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = DetalleProducto::create($request->all());
        return response()->json($data, 201);
        //
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DetalleProducto::find($id);
        return response()->json($data, 200);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = DetalleProducto::find($id);
        $data->fill($request->all());
        $data->save();
        return response()->json($data, 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
        $data = DetalleProducto::find($id);
        $data->delete();
        return response()->json("Delete", 204);
    }
        
        //
    }
