<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;

class PlayerController extends Controller
{
    //

    public function liste_joueur(Request $request){
        $query = Joueur::query();
    
        if ($request->filled('categorie')) {
            $query->where('categorie', $request->categorie);
        }
    
        if ($request->filled('sexe')) {
            $query->where('sexe', $request->sexe);
        }
    
        $joueurs = Joueur::all();

        //$joueurs = $query->paginate(3);
    
        return view('dashboard.liste', compact('joueurs'));
    }
    

    public function ajouter_joueur(){
        return view('dashboard.ajout');
    }
    

    public function ajouter_joueur_traitement(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:joueurs', 
            'categorie' => 'required|string|max:255',
            'sexe' => 'required|string|max:10', 
        ]);
    
        $joueur = new Joueur();
        // Lier la base de données et les champs
        $joueur->nom = $request->nom;
        $joueur->prenom = $request->prenom;
        $joueur->email = $request->email;
        $joueur->categorie = $request->categorie; 
        $joueur->sexe = $request->sexe; 
    
        // Sauvegarder dans la base de données
        $joueur->save();
    
        return redirect('/dashboard/ajout')->with('status', 'Le joueur a été ajouté avec succès!');
    }
    

    public function update_joueur($id){
        $joueurs = Joueur::find($id);
        return view('dashboard.update', compact('joueurs'));
    }

    public function update_joueur_traitement(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:joueurs,email,'.$request->id, // Ignorer l'email de l'utilisateur courant
            'categorie' => 'required|string|max:255', // Validation pour catégorie
            'sexe' => 'required|string|max:10', // Validation pour sexe
        ]);
    
        $joueur = Joueur::find($request->id);
        // Lier la base de données et les champs
        $joueur->nom = $request->nom;
        $joueur->prenom = $request->prenom;
        $joueur->email = $request->email;
        $joueur->categorie = $request->categorie; // Nouveau champ
        $joueur->sexe = $request->sexe; // Nouveau champ
    
        // Sauvegarder dans la base de données
        $joueur->save();
    
        return redirect('/dashboard/liste')->with('status', 'Le joueur a été modifié avec succès!');
    }
    

    public function delete_joueur($id){
        $joueurs = Joueur::find($id);
        $joueurs->delete();

        return redirect('/dashboard/liste')->with('status', 'Le joueur a été supprimé avec succès!');

    }

    
}
