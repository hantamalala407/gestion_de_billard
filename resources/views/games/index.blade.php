@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <h1>Liste des Parties</h1>
        <!--a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Créer une Partie</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
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
                @forelse($games as $game)
                    <tr>
                        <td>{{ $game->title }}</td>
                        <td>{{ $game->start_time }}</td>
                        <td>{{ $game->end_time ?? 'N/A' }}</td>
                        <td>{{ ucfirst($game->status) }}</td>
                        <td>
                            <a href="{{ route('games.edit', $game) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('games.destroy', $game) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucune partie trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table-->

        <h1>Liste des Parties</h1>

        @if ($games->isEmpty())
            <p>Aucune partie trouvée.</p>
        @else
            <ul>
                @foreach ($games as $game)
                    <li>{{ $game->title }} - {{ $game->start_time }} - {{ $game->status }}</li>
                @endforeach
            </ul>
        @endif

        
    </div>
</div>
@endsection
