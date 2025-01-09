<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Etablissement;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function recherche(Request $request)
    {
        $search = $request->input('recherche');       

        $vide = false;
        $etablissement = null;
        $entreprise = null;
        $entreprise = Entreprise::where('siren','=', "$search")->first();
        if ($entreprise != null) {
            $etablissement = Etablissement::where('siren','=', "$search")->get();
            
        }
        else {
            $etablissement = Etablissement::where('siret', '=', "$search")->first();
            if ($etablissement != null) {
                $entreprise = Entreprise::where('siren','=', "$etablissement->siren")->first();
            }else{
                $entreprise = Entreprise::where('nomEntr', 'like', "%$search%")->get();
                if (count($entreprise) == 0) {
                    $vide = true;     
                    $entreprise = null;
                }elseif (count($entreprise) > 1) {
                    $etablissement = collect();
                    foreach ($entreprise as $entr) {
                        $etabs = Etablissement::where('siren', $entr->siren)->get();
                        foreach ($etabs as $etab) {
                            $etablissement->push($etab);
                        }
                    }
                }
            }
        }   
        
        return view('dashboard', ['entreprise' => $entreprise, 'etablissements' =>$etablissement , 'vide' => $vide]);
    }
}
