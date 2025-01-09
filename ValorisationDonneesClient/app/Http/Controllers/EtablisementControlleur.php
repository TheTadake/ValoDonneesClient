<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EtablisementControlleur extends Controller
{
    function show($siret)
    {
        $etablissement = Etablissement::where('siret', $siret)->first();
        $entreprise = Entreprise::where('siren', $etablissement->siren)->first();
        


        return view('Etablissement.InfoComment',['etablissement' => $etablissement, 'entreprise' => $entreprise]);
    }
    public function store(Request $request){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        // On récupère les données du formulaire
        $data = $request->only(['texte', 'siret']);
        $data['id_user'] = Auth::user()->id;

        $etablissement = Etablissement::where('siret', $data['siret'])->first();
        
        // On crée le commentaire
        $comment = Commentaire::create($data);

        // On redirige l'utilisateur vers l'article
        return redirect()->route('etablissement.show', $etablissement->siret);
    }
}
