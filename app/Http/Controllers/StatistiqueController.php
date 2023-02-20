<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Candidat;
use App\Models\Referentiel;
use App\Models\Type;
use DB;


class StatistiqueController extends Controller
{
    
    public function create()
    {
        $formationCount = Formation::selectRaw('id , nom, duree, description, date_debut')->withcount('candidats')
        ->orderBy('candidats_count','desc')
        ->get();

        $candidatCount = Candidat::count();
        $candidatCountfemme = Candidat::where('sexe','femme')->count();
        $candidatCounthomme = Candidat::where('sexe','homme')->count();

        $referentiel = Referentiel::selectRaw('id , libelle, validated, horaire')->withcount('formations')
        ->orderBy('formations_count','desc')
        ->get();

        $typeCount = Type::count();
        $repartition_formations  = Type::with('referentiels.formations')
        ->whereIn('libelle', ['initiation', 'metier'])->get();
        
        $ages = DB::table('candidats')->select('age', DB::raw('count(*) as total'))
        ->groupBy('age')->orderBy('age')->get();

        $formation_tranche = DB::table('formations')->select('isStarted', DB::raw('count(*) as total'))
        ->groupBy('isStarted')->orderBy('isStarted')->get();
       // statistique/ajoutStatistique
        return view('dashboard',
        compact('formationCount','candidatCount','candidatCountfemme',
        'candidatCounthomme','referentiel','typeCount','repartition_formations','ages','formation_tranche'));
    }

  
}
