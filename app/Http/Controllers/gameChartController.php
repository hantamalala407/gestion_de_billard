<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class gameChartController extends Controller
{



    public function index()
    {
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



}
