<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\etudiant;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ListController extends Controller
{
    public function index(){
        $etudiants = Etudiant::orderBy("nom","asc")->paginate(5);
return view("etudiant",compact("etudiants"));
    }



    public function create(){
        $classes = classe::all();
return view("createEtudiant",compact("classes"));
    }



    public function edit(Etudiant $etudiant){
        $classes = classe::all();

return view("editEtudiant",compact("etudiant","classes"));
    }








    public function store (Request $request){
        $request->validate([
            "nom"=>"Required",
            "prenom"=>"Required",
            "classe_id"=>"Required"
        ]);

        etudiant::create($request->all());
        return back()->with("success","etudiant ajouté :-) ");
    }


public function delete(Etudiant $etudiant )
{
    $nom_complet = $etudiant->nom ." " .$etudiant->prenom ;
$etudiant->delete();
return back()-> with("successDelete","l'etudiant '$nom_complet' supprimé ");
}

public function update (Request $request,Etudiant $etudiant){
    $request->validate([
        "nom"=>"Required",
        "prenom"=>"Required",
        "classe_id"=>"Required"
    ]);

    $etudiant->update([
        "nom"=>$request->nom,
        "prenom"=>$request->prenom,
        "classe_id"=>$request->classe_id
    ]);




    // etudiant::create($request->all());
    return back()->with("success","etudiant mis à jour avec succés :-) ");
}







}
