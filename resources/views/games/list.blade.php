@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container text-center">
        <div class="row">
            <div class="col s12">

                <div class="form-inline mb-3"> 
                    <form class="search d-flex" action="{{ route('games.search') }}" method="GET" method="GET" style="max-width: 400px; width: 100%; margin-right: 400px">
                        <input type="text" name="query" class="form-control me-2" placeholder="Rechercher un joueur" required style="width: 100%;">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>

                    <!-- Boutons d'action après recherche -->
                    @if(isset($query) && !empty($query)) <!-- Affiche les boutons si une recherche a été faite -->
                        <div class="mb-3">
                            
                            <a href="{{ route('games.index') }}" class="btn btn-secondary mr-2">
                                <button class="btn btn-outline-primary" onclick="window.location.reload()">
                                    <i class="mdi mdi-refresh"></i>
                                </button>
                            </a>
                            
                        </div>
                    @endif
                    
                </div>
                
                <hr>

                <div class="d-flex align-items-center">
                    <h1 class="me-2" style="margin-right: 400px">Liste des parties</h1> <!-- Augmentez la valeur ici pour plus d'espace -->
                    <a href="/dashboard/ajout" class="btn btn-primary">ajouter une partie</a>
                </div>
                <hr>
                    @if (session('status'))

                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    
                    @endif
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date de Début</th>
                            <th>Date de Fin</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($games as $game)
                            <tr>
                                <td>{{ $game->title }}</td>
                                <td>{{ $game->start_time }}</td>
                                <td>{{ $game->end_time ?? 'N/A' }}</td>
                                <td>{{ ucfirst($game->status) }}</td>
                                <td>
                                    <a href="/games/edit/{{ $game->id }}" class="btn btn-info"><span class="mdi mdi-pen"></span></a>
                                    <a href="/games/delete/{{ $game->id }}" class="btn btn-danger"><span class="mdi mdi-delete-forever"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>

                {{ $games->links() }}

            </div>
        </div>
    </div>
</div>
@endsection