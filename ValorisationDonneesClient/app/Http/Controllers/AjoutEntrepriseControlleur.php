<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjoutEntrepriseControlleur extends Controller
{
    function index()
    {
        return view('AjoutEntreprise');
    }
    
    function ajouter(Request $request)
    {
        $request->validate([
            'siren' => 'required',
            'nomEntr' => 'required',
            'siret' => 'required',
        ]);
        
        // Création de l'entreprise
        $entreprise = new Entreprise();
        $entreprise->siren = $request->siren;
        $entreprise->nomEntr = $request->nomEntr;
        $entreprise->personneMoral = $request->personneMoral;
        $entreprise->nom = $request->nom;
        $entreprise->prenom = $request->prenom;
        $entreprise->codenaf = $request->codenaf;
        $entreprise->libelleNaf = $request->libelleNaf;
        $entreprise->statutRcs = $request->statutRcs;
        $entreprise->numRcs = $request->numRcs;
        
        // Création de l'établissement
        $etablissement = new Etablissement();
        $etablissement->siret = $request->siret;
        $etablissement->siren = $request->siren;
        $etablissement->nic = $request->nic;
        $etablissement->ville = $request->ville;
        $etablissement->codePays = $request->codePays;
        $etablissement->pays = $request->pays;
        $etablissement->siege = $request->has('siege');
        $etablissement->active = $request->has('active');
        $etablissement->codenaf = $request->etab_codenaf;
        $etablissement->libelleNaf = $request->etab_libelleNaf;
        $etablissement->adresse = $request->adresse;

        try {
            // Sauvegarde dans la base de données
            $entreprise->save();
            $etablissement->save();
            
            return redirect()->route('entreprise.index')->with('success', 'Entreprise et établissement ajoutés avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage())->withInput();
        }
    }
}
