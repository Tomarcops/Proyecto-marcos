<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voto;
use App\Models\Eleccion;
use App\Models\Casilla;
use Illuminate\Support\Facades\DB;

class VotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $votos = Voto::all();
           return view('voto/list', compact('votos'));
        */
        $votos = DB::table('voto')
        ->join('eleccion', 'voto.eleccion_id', '=', 'eleccion.id')
        ->join('casilla', 'voto.casilla_id', '=', 'casilla.id')
       
        ->select('voto.id', 'eleccion.periodo as eleccion',
        'casilla.ubicacion as casilla', 'voto.evidencia')
        ->get(); 
      
       return view("voto/list", 
       compact("votos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elecciones = Eleccion::all();
        $casillas = Casilla::all();
        return view(
            'voto/create',
            compact("elecciones", "casillas")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'eleccion_id' => 'required|max:1',
            'casilla_id' => 'required|max:1',
            'evidencia' => 'required|max:200',
        ]);

        $data = [
            "id" => $request->id,
            "eleccion_id" => $request->eleccion_id,
            "casilla_id" => $request->casilla_id,
            "evidencia" => $request->evidencia
        ];

        $voto = Voto::create($data);
        return redirect('voto')
            ->with('success', ' guardado satisfactoriamente ...');
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
        $voto = Voto::find($id);
        return view('voto/edit', compact('voto'));
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
        $request->validate([
            'eleccion_id' => 'required|max:1',
            'casilla_id' => 'required|max:1',
            'evidencia' => 'required|max:200',
        ]);

        $data = [
            "id" => $request->id,
            "eleccion_id" => $request->eleccion_id,
            "casilla_id" => $request->casilla_id,
            "evidencia" => $request->evidencia
        ];

        Voto::whereId($id)->update($data);
        return redirect('voto')
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
        $voto = Voto::find($id);
        $voto->delete();
        return redirect('voto');
    }
}
