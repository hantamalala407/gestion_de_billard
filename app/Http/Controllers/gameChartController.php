<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class gameChartController extends Controller
{
    //
    /*public function gameChart()
    {
        $games = Game::SelectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at',date('Y'))
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();


        $labels = [];
        $data = [];
        $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#FF5722', '#009688', '#797548', '#9C27BO', '#2196F3', '#FF9800', '#CDDC39', '#607D8B'];

        for ($i=1; $i < 12; $i++) { 
            $month = date('F', mktime(0,0,0,$i,1));
            $count = 0;

            foreach ($games as $game){
                if($game->month == $i){
                    $count = $game->count;
                    break;

                }
            }

            array_push($labels,$month);
            array_push($data, $count);
        }

        $datasets = [
            [
                'labels' => 'games',
                'data' => $data,
                'backgroundColor' => $colors
            ]
            ];

            //return view('charts', compact('datasets', 'labels'));
            return view('/dashboard/statistique', compact('datasets', 'labels'));

    }*/



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
