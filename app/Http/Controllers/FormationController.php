<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Referentiel;
use App\Models\Type;
//use App\Models\referentiel_formation;

class FormationController extends Controller
{
   
    public function index()
    {
        $formation = Formation::all();
        $formationCount = Formation::selectRaw('id , nom, duree, description, date_debut')->withcount('candidats')
        ->orderBy('candidats_count','desc')
        ->get();

        return view('formation.index', ['formation' => $formation,'formationCount' => $formationCount]);

    }

    
    public function create()
    {
        $referentiel = Referentiel::all();
        return view('formation/ajout',['referentiel'=>$referentiel]);
    }

    
    public function store(Request $request)
    {
        // $input = $request->all();
        // Formation::create($input);
        $formation = Formation::create($request->all());
        $formation->referentiels()->attach($request->input('referentiel_id'));
        return redirect('formation/create')->with('flash_message','Formation créé');
    
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $formation = Formation::find($id);
        return view('formation.edit', compact('formation'));
    }

    
    public function updateFormation(Request $request, $id)
    {
        $formation = Formation::find($id);
        $input = $request->all();
        $formation->update($input);
        return redirect('formation/index')->with('flash_message', 'formation modifier!');  
    }

    
    public function destroyFormation($id)
    {
        Formation::destroy($id);
        return redirect('formation/index')->with('flash_message', 'Formation supprimer!');  
    }
}
