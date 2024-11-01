<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\gameChartController;
use App\Http\Controllers\playerChartController;



Route::resource('games', GameController::class);

Route::get('/', function() {
    return view('home');
});

Route::get('dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
//Route::post('register', [AuthController::class, 'register']);
//Route::post('logout', [AuthController::class, 'showLoginForm'])->name('logout');
Route::post('logout', [AuthController::class, 'home'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');
//Route::get('index', [AuthController::class, 'show']);
Route::get('/user/{id}', [AuthController::class, 'show'])->name('user.show');
Route::get('/index', [AuthController::class, 'index'])->name('index');

/*Route::get('index', function() {
    return view('index');
});*/
// route qui fait revenir à dash
Route::get('dashboard', function() {
    return view('index');
});
//route pour ajout et liste
Route::get('/dashboard/ajout', function() {
    return view('dashboard.ajout');
});
Route::get('/dashboard/liste', function() {
    return view('dashboard.liste');
});

// route pour le controller du Palyer
Route::get('/dashboard/liste', [PlayerController::class, 'liste_joueur']);
Route::get('/dashboard/update/{id}', [PlayerController::class, 'update_joueur']);
Route::post('/update/traitement', [PlayerController::class, 'update_joueur_traitement']);
Route::get('/dashboard/delete/{id}', [PlayerController::class, 'delete_joueur']);
Route::get('/dashboard/ajout', [PlayerController::class, 'ajouter_joueur']);
Route::post('/ajout/traitement', [PlayerController::class, 'ajouter_joueur_traitement']);
Route::get('index', [PlayerController::class, 'index']);
Route::get('/dashboard/liste', [PlayerController::class, 'liste_joueur'])->name('joueur.liste');
//Route::get('index', [PlayerController::class, 'total'])->name('joueur.total');
Route::get('index', [PlayerController::class, 'show'])->name('joueur.total');

//route pour la page de statistique
Route::get('/dashboard/statistique', function() {
    return view('dashboard.statistique');
});

Route::get('/games', [GameController::class, 'index'])->name('games.index'); 
Route::get('/games/create', [GameController::class, 'create'])->name('games.create'); 
Route::post('/games', [GameController::class, 'list'])->name('games.store'); 
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show'); 
Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit'); 
Route::post('/games/edit', [GameController::class, 'edit_traitement'])->name('games.update'); 
Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy'); 
Route::get('/games/list', [GameController::class, 'index'])->name('games.list');
Route::get('/games/edit/{id}', [GameController::class, 'edit']);
Route::get('/games/delete/{id}', [GameController::class, 'destroy']);
Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');
Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
Route::get('index', [GameController::class, 'total'])->name('games.total');
//Route::get('/games', [GameController::class, 'index']);


Route::get('/games/create', function() {
    return view('games.create');
})->name('games.create');
Route::get('/games/edit', function() {
    return view('games.edit');
});

Route::get('/parametre/parametre', function() {
    return view('parametre.parametre');
});

//Route::get('index', 'YourController@index')->middleware('no-cache');

Route::middleware(['auth'])->group(function () {
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('index', [ProfileController::class, 'edit'])->name('index');
    Route::post('index', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.delete');
});

Route::get('index', [gameChartController::class, 'index']);

/*Route::middleware(['auth'])->group(function () {
    Route::get('index', [AuthController::class, 'index']);
    // Autres routes protégées
});*/
