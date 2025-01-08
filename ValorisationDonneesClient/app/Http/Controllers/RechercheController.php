<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Etablissement;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function recherche(Request $request)
    {
        $search = $request->input('search');
        $etablissement =false;
        $entreprise = Entreprise::where('siren', 'like', "$search")->first();
        if ($entreprise != null) {
            $etablissement = false;
            
        }
        else {
            $entreprise = Entreprise::where('nomEntr', 'like', "%$search%")->get();
            if ($entreprise != null) {
                $etablissement = false;
                
            }else {
                $entreprise = Etablissement::where('siret', 'like', "$search")->first();
                if ($entreprise != null) {
                    $etablissement = true;
                    
                }
            }
        }
        return view('recherche', ['entreprise' => $entreprise, 'etablissement' =>$etablissement]);
    }
}
