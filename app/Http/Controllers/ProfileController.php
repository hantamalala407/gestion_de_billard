<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Joueur;
use App\Models\Game;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        //return view('profile.edit', ['user' => Auth::user()]);
        return view('index', ['user' => Auth::user()]);
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:8',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
    ]);

    $user = Auth::user();

    // Mettre à jour le nom et l'email
    $user->name = $request->name;
    $user->email = $request->email;

    // Si un nouveau mot de passe est fourni, le mettre à jour
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    // Gestion du téléchargement de l'image
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        // Enregistrer la nouvelle image
        $path = $request->file('image')->store('profile_images', 'public');
        $user->image = $path;
    }

    $user->save();

    $data = [
        'months' => ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        'players' => [],
        'gamesPlayed' => [],
    ];

    
        // Récupérer le nombre de joueurs par mois
        for ($i = 1; $i <= 12; $i++) {
            $data['players'][] = Joueur::whereMonth('created_at', $i)->count();
            $data['gamesPlayed'][] = Game::whereMonth('created_at', $i)->count();
        }

    //return redirect()->route('index')->with('success', 'Profil mis à jour avec succès.');
    return view('index', compact('data'));
}

    public function destroy()
    {
        $user = Auth::user();
        
        // Supprimer l'image si elle existe
        if ($user->image) {
            Storage::delete($user->image);
        }

        // Supprimer l'utilisateur
        $user->delete();

        return redirect('/')->with('success', 'Compte supprimé avec succès.');
    }


}
