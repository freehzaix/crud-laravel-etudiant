<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{

    public function liste_etudiant(){
        $etudiants = Etudiant::paginate(5);

        return view('etudiant.liste', compact('etudiants'));
    }

    public function ajouter_etudiant(){
        return view('etudiant.ajouter');
    }

    public function ajouter_etudiant_traitement(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->save();

        return redirect('/ajouter')->with('status', 'L\'étudiant ' . $etudiant->nom . ' a bien été ajouter avec succès.');

    }

    public function update_etudiant($id){
        $etudiant = Etudiant::find($id);

        return view('etudiant.modifier', compact('etudiant'));
    }

    public function update_etudiant_traitement(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->update();

        return redirect('/etudiants')->with('status', 'L\'étudiant ' . $etudiant->nom . ' a bien été modifié avec succès.');

    }

    public function delete_etudiant($id){
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect('/etudiants')->with('status', 'L\'étudiant ' . $etudiant->nom . ' a bien été supprimé avec succès.');

    }

}
