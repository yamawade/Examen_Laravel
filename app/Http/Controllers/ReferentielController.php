<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referentiel;
use App\Models\Formation;
use App\Models\Type;

class ReferentielController extends Controller
{
    public function index()
    {
        $referentiel = Referentiel::all();
        return view('referentiel.indexReferentiel', ['referentiel' => $referentiel]);
    }

    public function create()
    {
        $type = Type::all();
        return view('referentiel/ajoutReferentiel',['type'=>$type]);
    }

    public function storeReferentiel(Request $request)
    {
        $referentiel = Referentiel::create($request->all());
        $referentiel->types()->attach($request->input('type_id'));
        return redirect('referentiel/create')->with('flash_message','Formation créé');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $referentiel = Referentiel::find($id);
        return view('referentiel.editReferentiel', compact('referentiel'));
    }

    public function update(Request $request, $id)
    {
        $referentiel = Referentiel::find($id);
        $input = $request->all();
        $referentiel->update($input);
        return redirect('referentiel/indexReferentiel')->with('flash_message', 'referentiel modifier!');  
    }

    public function destroy($id)
    {
        Referentiel::destroy($id);
        return redirect('referentiel/indexReferentiel')->with('flash_message', 'referentiel supprimer!');  
    }
}
