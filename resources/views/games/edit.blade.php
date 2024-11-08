@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="container text-center">Modifier une Partie</h1>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('games.update', $game->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $game->id }}">
                        
                            <div class="form-group">
                                <label for="title" class="form-label">Titre de la Partie</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $game->title }}" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="player1" class="form-label">Joueur 1</label>
                                <input type="text" name="player1" id="player1" class="form-control" value="{{ $game->player1 }}" required>
                                @error('player1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="player2" class="form-label">Joueur 2</label>
                                <input type="text" name="player2" id="player2" class="form-control" value="{{ $game->player2 }}" required>
                                @error('player2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="start_time" class="form-label">Date et Heure de Début</label>
                                <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ $game->start_time }}" required>
                                @error('start_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end_time" class="form-label">Date et Heure de Fin (optionnel)</label>
                                <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ $game->end_time }}">
                                @error('end_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status" class="form-label">Statut</label>
                                <select class="js-example-basic-single" style="width:100%" name="status" id="status" required>
                                    <option value="">Sélectionnez un statut</option>
                                    <option value="upcoming" {{ $game->status == 'upcoming' ? 'selected' : '' }}>À Venir</option>
                                    <option value="ongoing" {{ $game->status == 'ongoing' ? 'selected' : '' }}>En Cours</option>
                                    <option value="finished" {{ $game->status == 'finished' ? 'selected' : '' }}>Terminé</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <button type="submit" class="btn btn-primary mr-2">Modifier la partie</button>
                            <a href="{{ route('games.index') }}" class="btn btn-danger">Revenir à la liste des parties</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
