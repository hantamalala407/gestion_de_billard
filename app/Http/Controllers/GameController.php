<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all(); // Vous pouvez utiliser la pagination si nécessaire
        return view('games.list', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function list(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'player1' => 'required|string|max:255', 
            'player2' => 'required|string|max:255', 
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after:start_time',
            'status' => 'required|string',
        ]);

        
        Game::create($request->only('title', 'player1', 'player2', 'start_time', 'end_time', 'status')); // Ajout de player1 et player2

        return redirect()->route('games.create')->with('status', 'Partie créée avec succès.');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'player1' => 'required|string|max:255', 
            'player2' => 'required|string|max:255', 
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after:start_time',
            'status' => 'required|string',
        ]);

        // Mettre à jour les données
        $game->title = $request->title;
        $game->player1 = $request->player1; 
        $game->player2 = $request->player2; 
        $game->start_time = $request->start_time;
        $game->end_time = $request->end_time;
        $game->status = $request->status;

        // Sauvegarder les modifications
        $game->save();

        return redirect()->route('games.index')->with('status', 'Partie mise à jour avec succès');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('games.index')->with('status', 'Partie supprimée avec succès');
    }
}
