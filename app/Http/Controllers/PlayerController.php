<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;

class PlayerController extends Controller
{
    //

    public function liste_joueur(){
        //maka ny anarana rehetra ao anaty base
        //$joueurs = Joueur::paginate(3);
        
        $joueurs = Joueur::all();
        
        return view('dashboard.liste', compact('joueurs'));

    }

    public function ajouter_joueur(){
        return view('dashboard.ajout');
    }
    public function ajouter_joueur_traitement(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $joueur = new Joueur();
        //lié la base de données et les champs
        $joueur->nom = $request->nom;
        $joueur->prenom = $request->prenom;
        $joueur->email = $request->email;
        // sauvegarder dans la base de données
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
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        $joueur = Joueur::find($request->id);
        //lié la base de données et les champs
        $joueur->nom = $request->nom;
        $joueur->prenom = $request->prenom;
        $joueur->email = $request->email;
        // sauvegarder dans la base de données
        $joueur->update();
        return redirect('/dashboard/liste')->with('status', 'Le joueur a été modifié avec succès!');
    }

    public function delete_joueur($id){
        $joueurs = Joueur::find($id);
        $joueurs->delete();

        return redirect('/dashboard/liste')->with('status', 'Le joueur a été supprimé avec succès!');

    }

   /* public function show()
    {
        $totalJoueurs = Joueur::count(); 
        return view('index', compact('totalJoueurs')); 
    }*/

    
}
