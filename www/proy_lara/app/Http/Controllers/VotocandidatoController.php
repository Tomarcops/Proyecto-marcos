<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Votocandidato;
use App\Models\Voto;
use App\Models\Candidato;

class VotocandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        $votocandidatos = Votocandidato::all();
        return view('votocandidato/list', compact('votocandidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $votos = Voto::all();
          $candidatos = Candidato::all();

        return view('votocandidato/create', 
        compact("votos", "candidatos"));
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
            'voto_id' => 'required|max:1',
            'candidato_id' => 'required|max:1',
            'votos' => 'required|max:200',
        ]);

        $data = [
        "voto_id"=>$request->voto_id,
        "candidato_id"=>$request->candidato_id,
        "votos"=>$request->votos];

        $votocandidato = Votocandidato::create($data);
        return redirect('votocandidato')
        ->with('success',  ' guardado satisfactoriamente ...');
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
        $votocandidato = Votocandidato::find($id);
        return view('votocandidato/edit', compact('votocandidato'));

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
            'voto_id' => 'required|max:1',
            'candidato_id' => 'required|max:1',
            'votos' => 'required|max:200',
        ]);

        $data = [
        "voto_id"=>$request->voto_id,
        "candidato_id"=>$request->candidato_id,
        "votos"=>$request->votos];

        Votocandidato::whereId($id)->update($data);
        return redirect('votocandidato')
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
        $votocandidato = Votocandidato::find($id);
        $votocandidato->delete();
        return redirect('votocandidato');
    }
}
