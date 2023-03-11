<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessCodeTypes;

class AccessCodeTypesController extends Controller
{
    public function index()
    {
        $AccessCodeTypes = AccessCodeTypes::all();


        // $respuesta = Http::get(route('ejemplo'));

        // $contenido = $respuesta->body();

        // $response = Http::post($url, [
        //     'campo1' => $valor1,
        //     'campo2' => $valor2,
        // ]);

        // $contenido = $response->body();


        return $AccessCodeTypes;

        return view('AccessCodeTypes.index', compact('AccessCodeTypes'));
    }

    public function create()
    {
        return view('AccessCodeTypes.create');
    }

    public function store(Request $request)
    {
        $AccessCodeTypes = new AccessCodeTypes();

        $AccessCodeTypes->nombre = $request->nombre;
        $AccessCodeTypes->descripcion = $request->descripcion;
        $AccessCodeTypes->precio = $request->precio;

        $AccessCodeTypes->save();

        return redirect()->route('AccessCodeTypes.index')->with('success', 'AccessCodeTypes creado exitosamente.');
    }

    public function show(AccessCodeTypes $AccessCodeTypes)
    {
        return view('AccessCodeTypes.show', compact('AccessCodeTypes'));
    }

    public function edit(AccessCodeTypes $AccessCodeTypes)
    {
        return view('AccessCodeTypes.edit', compact('AccessCodeTypes'));
    }

    public function update(Request $request, AccessCodeTypes $AccessCodeTypes)
    {
        $AccessCodeTypes->nombre = $request->nombre;
        $AccessCodeTypes->descripcion = $request->descripcion;
        $AccessCodeTypes->precio = $request->precio;

        $AccessCodeTypes->save();

        return redirect()->route('AccessCodeTypes.index')->with('success', 'AccessCodeTypes actualizado exitosamente.');
    }

    public function destroy(AccessCodeTypes $AccessCodeTypes)
    {
        $AccessCodeTypes->delete();

        return redirect()->route('AccessCodeTypes.index')->with('success', 'AccessCodeTypes eliminado exitosamente.');
    }
}
