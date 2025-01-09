<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Etablissement;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function recherche(Request $request)
    {/*
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
        */


        $search = $request->input('recherche');
        $siren =false;
        $siret = false;
        $nom = false;

        if (strlen($search) == 9) {
            $siren = true;
        }elseif (strlen($search) == 14) {
            $siret = true;
        }else{
            $nom = true;
        }

        $vide = false;
        $etablissement = null;        
        $entreprise = null;

        if ($siren) {
            $entreprise = collect();
            $entreprise->push(Entreprise::where('siren','=', "$search")->first());
            
            $etablissement = Etablissement::where('siren','=', "$search")->get();

        }elseif ($siret) {
            $etablissement = collect();
            $etablissement->push ( Etablissement::where('siret', '=', "$search")->first());
            $sirenEtab = $etablissement[0]->siren;
            $entreprise = Entreprise::where('siren','=', "$sirenEtab")->get();

        }elseif ($nom) {
            $entreprise= Entreprise::where('nomEntr', 'like', "%$search%")->get();
            if (count($entreprise) <= 0) {
                $vide = true;     
                $entreprise = null;
                $etablissement = null;
            }elseif (count($entreprise) > 1) {
                $etablissement = collect();
                foreach ($entreprise as $entr) {
                    $etabs = Etablissement::where('siren', $entr->siren)->get();
                    foreach ($etabs as $etab) {
                        $etablissement->push($etab);
                    }
                }
            }else{
                $etablissement = Etablissement::where('siren', $entreprise[0]->siren)->get();
            }
            
        
        }
        return view('dashboard', ['entreprise' => $entreprise, 'etablissement' =>$etablissement , 'vide' => $vide]);
    }
}