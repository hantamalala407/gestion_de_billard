<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return response()->json(['success' => true], 200);
        return redirect()->intended('index');
    }

    return response()->json(['success' => false, 'message' => 'Les informations de connexion ne correspondent pas à nos enregistrements.'], 401);

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

    return view('index', compact('data'));

}   


    public function showRegisterForm()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Créer un nouvel utilisateur
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    
        // Gérer le téléchargement de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $user->image = $path; // Sauvegarder le chemin de l'image
        }
    
        // Sauvegarde et débogage
        try {
            if ($user->save()) {
                return redirect()->route('login')->with('success', 'Inscription réussie!');
            } else {
                return redirect()->back()->with('error', 'Échec de l\'enregistrement.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function home()
    {

         // Vérifie si la session est déjà démarrée
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Démarre la session si elle n'est pas déjà démarrée
        }

        //session_destroy();
        //return view('home');

        session_destroy();
        return response()
            ->view('home')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');

    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        dd($user); // Affichez l'utilisateur pour le débogage
        return view('index', compact('user'));
    }

    
}