<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionariocasilla;
use App\Models\Funcionario;
use App\Models\Casilla;
use App\Models\Rol;
use App\Models\Eleccion;
use Illuminate\Support\Facades\DB;



class FuncionariocasillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $funcionariocasillas = Funcionariocasilla::all();
        return view('funcionariocasilla/list', compact('funcionariocasillas'));
        */
        $funcionariocasillas = DB::table('funcionariocasilla')
        ->join('funcionario', 'funcionariocasilla.funcionario_id', '=', 'funcionario.id')
        ->join('casilla', 'funcionariocasilla.casilla_id', '=', 'casilla.id')
        ->join('rol', 'funcionariocasilla.rol_id', '=', 'rol.id')
        ->join('eleccion', 'funcionariocasilla.eleccion_id', '=', 'eleccion.id')
       
        ->select('funcionariocasilla.id', 'funcionario.nombrecompleto as funcionario',
        'casilla.ubicacion as casilla', 'rol.descripcion as rol','eleccion.periodo as eleccion')
        ->get(); 
      
       return view("funcionariocasilla/list", 
       compact("funcionariocasillas"));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $funcionarios = Funcionario::all();
         $casillas = Casilla::all();
         $roles = Rol::all();
         $elecciones = Eleccion::all();

        return view('funcionariocasilla/create', 
        compact("funcionarios", "casillas", "roles", "elecciones"));
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
            'funcionario_id' => 'required|max:1',
            'casilla_id' => 'required|max:1',
            'rol_id' => 'required|max:1',
            'eleccion_id' => 'required|max:1',
        ]);

        $data = ["id" => $request->id,
        "funcionario_id"=>$request->funcionario_id,
        "casilla_id"=>$request->casilla_id,
        "rol_id"=>$request->rol_id,
        "eleccion_id"=>$request->eleccion_id];

        $funcionariocasilla = Funcionariocasilla::create($data);
        return redirect('funcionariocasilla')
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
        $funcionariocasilla = Funcionariocasilla::find($id);
        return view('funcionariocasilla/edit', compact('funcionariocasilla'));

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
            'funcionario_id' => 'required|max:1',
            'casilla_id' => 'required|max:1',
            'rol_id' => 'required|max:1',
            'eleccion_id' => 'required|max:1',
        ]);

        $data = ["id" => $request->id,
        "funcionario_id"=>$request->funcionario_id,
        "casilla_id"=>$request->casilla_id,
        "rol_id"=>$request->rol_id,
        "eleccion_id"=>$request->eleccion_id];

        Funcionariocasilla::whereId($id)->update($data);
        return redirect('funcionariocasilla')
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
        $funcionariocasillas = Funcionariocasilla::find($id);
        $funcionariocasillas->delete();
        return redirect('funcionariocasilla');
    }
}
