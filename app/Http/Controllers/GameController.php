<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index()
    {
        //$game = Game::all();
        $games = Game::paginate(3);
        return view('games.list', compact('games'));

        /*$totalGames = Game::count();
        dd($totalGames); // Affiche la valeur
        return view('index', compact('totalGames'));*/
        $totalGames = Game::count();
    }

    public function create()
    {
        return view('games.create');
    }

    //public function store(Request $request)
    public function list(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date',
            //'status' => 'in:upcomming,ongoing,finished'
            'status' => 'required|string',
        ]);

        Game::create($request->all());

        return redirect()->route('games.create')->with('status', 'Partie créée avec succès.');
    }


    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /*public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }*/

    public function edit($id){
        $game = Game::find($id);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id) {
        $game = Game::findOrFail($id); // Récupérer la partie existante
    
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after:start_time',
            'status' => 'required|string',
        ]);
    
        // Mettre à jour les données
        $game->title = $request->title;
        $game->start_time = $request->start_time;
        $game->end_time = $request->end_time;
        $game->status = $request->status;
    
        // Sauvegarder les modifications
        $game->save();
    
        return redirect()->route('games.index')->with('status', 'Partie mise à jour avec succès');
    }
    

    //public function destroy(Game $game)
    public function destroy($id) 
    {
        $game = Game::findOrFail($id);
        $game->delete();
        //return redirect()->route('games.index');
        return redirect()->route('games.index')->with('status', 'Partie supprimée avec succès');
    }

    
    public function search(Request $request)
    {

        dd($request->all());

        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');

        // Effectuer la recherche
        $games = Game::where('title', 'LIKE', "%{$query}%")->paginate(3);

        return view('games.list', compact('games', 'query'));
    }


}

