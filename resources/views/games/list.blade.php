@extends('layouts.app')

@section('title', 'Afebas - Admin IDEA')

@section('content')
<div class="content-wrapper">
    <div class="container text-center">

        <div class="row">
            <div class="col s12">
                <div class="form-inline mb-3"> 
                    <form class="search d-flex" method="GET" style="max-width: 400px; width: 100%; margin-right: 400px">
                        <input type="text" name="search" class="form-control me-2" placeholder="Rechercher une partie" required style="width: 100%;" id="searchbar" onkeyup="search_nom()">
                    </form>
        
                    @if(isset($hasSearched) && $hasSearched) 
                        <a href="{{ route('games.index') }}" class="btn btn-link mr-2">
                            <button class="btn btn-outline-primary" onclick="window.location.reload()">
                                <i class="mdi mdi-redo-variant"></i>
                            </button>                                        
                        </a>
                    @endif
                </div>
                
                <hr>
        
                <div class="d-flex align-items-center">
                    <h1 class="me-2" style="margin-right: 400px">Liste des parties</h1>
                    <a href="/games/create" class="btn btn-primary">Ajouter une partie</a>
                </div>
                
                <hr>
        
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
        
                <table class="table table-striped">
                    <thead>
                        <tr id="list">
                            <th class="titres">Titre de la partie</th>
                            <th class="titres">Joueur 1</th>
                            <th class="titres">Joueur 2</th>
                            <th class="titres">Date de Début</th>
                            <th class="titres">Date de Fin</th>
                            <th class="titres">Statut</th>
                            <th class="titres">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="gameTable">
                        @foreach($games as $game)
                        <tr>
                            <td>{{ $game->title }}</td>
                            <td>{{ $game->player1 }}</td> <!-- Affichage de Joueur 1 -->
                            <td>{{ $game->player2 }}</td> <!-- Affichage de Joueur 2 -->
                            <td class="titres">{{ $game->start_time }}</td>
                            <td class="titres">{{ $game->end_time ?? 'N/A' }}</td>
                            <td class="titres">{{ ucfirst($game->status) }}</td>
                            <td>
                                <a href="/games/edit/{{ $game->id }}" class="btn btn-info"><span class="mdi mdi-pen"></span></a>
                                <a href="#" class="btn btn-danger" onclick="confirmDelete('{{ $game->id }}')">
                                    <span class="mdi mdi-delete-forever"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        
                <br>
            </div>
        </div>
        

    </div>
</div>

<script>
    function search_nom() {
        const input = document.getElementById('searchbar');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('gameTable');
        const rows = table.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let found = false;

            for (let j = 0; j < cells.length; j++) {
                if (cells[j]) {
                    const txtValue = cells[j].textContent || cells[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }

            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

    /* 
        Delete
    */
    function confirmDelete(gameId) {
        swal({
            title: "Êtes-vous sûr ?",
            text: "Vous allez supprimer ce partie !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Oui, supprimer !",
            //cancelButtonColor: "blue",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                // Si l'utilisateur confirme, redirigez vers la suppression
                window.location.href = "/games/delete/" + gameId;
            }
        });
    }

</script>

<script src="/js/list.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

@endsection

