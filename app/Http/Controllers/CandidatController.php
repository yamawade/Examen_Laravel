<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Formation;

class CandidatController extends Controller
{
    public function index()
    {
        $candidat = Candidat::all();
        return view('candidat.indexCandidat', compact('candidat'));
    }

    public function create()
    {
        $formation = Formation::all();
       return view('candidat/ajoutCandidat',['formation'=>$formation]);
    }

    public function storeCandidat(Request $request)
    {
        $candidat = Candidat::create($request->all());
        $candidat->formations()->attach($request->input('formation_id'));
        return redirect('candidat/create')->with('flash_message','candidat créé');
    }

    public function edit($id)
    {
        $candidat = Candidat::find($id);
        return view('candidat.editCandidat', compact('candidat'));
    }

    public function update(Request $request, $id)
    {
        $candidat = Candidat::find($id);
        $input = $request->all();
        $candidat->update($input);
        return redirect('candidat/indexCandidat')->with('flash_message', 'candidat modifier!');  
    }

    public function destroy($id)
    {
        Candidat::destroy($id);
        return redirect('candidat/indexCandidat')->with('flash_message', 'Candidat supprimer!');  
    }
}
