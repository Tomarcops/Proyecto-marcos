<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleccion;

class EleccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elecciones = Eleccion::all();
        return view ('eleccion/list', compact('elecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eleccion/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'periodo' => 'required|max:100',
            'fecha' => 'required|max:11',
            'fechaapertura' => 'required|max:11',
            'horaapertura' => 'required|max:20',
            'fechacierre' => 'required|max:11',
            'horacierre' => 'required|max:20',
            'observaciones' => 'required|max:100',
        ]);
        $eleccion = Eleccion::create($validacion);
        return redirect('eleccion')->with('success', ' guardado satisfactoriamente ...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eleccion = Eleccion::find($id);
        return view('eleccion/edit', compact('eleccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion = $request->validate([
        'periodo' => 'required|max:100',
        'fecha' => 'required|max:20',
        'fechaapertura' => 'required|max:20',
        'horaapertura' => 'required|max:20',
        'fechacierre' => 'required|max:20',
        'horacierre' => 'required|max:20',
        'observaciones' => 'required|max:100',
        ]);
        
        Eleccion::whereId($id)->update($validacion);
        return redirect('eleccion')
        ->with('success', 'Actualizado correctamente...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eleccion = Eleccion::find($id);
        $eleccion->delete();
        return redirect('eleccion');
    }
}
