@extends('layouts.app')

@section('title', 'Afebas - Admin IDEA')

@section('content')
<div class="content-wrapper">
    <div class="container text-center">
        <div class="row">
            <div class="col s12">
                <div class="form-inline mb-3"> 
                    <form class="search d-flex" method="GET" style="max-width: 400px; width: 100%; margin-right: 400px">
                        <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un joueur" required style="width: 100%;" id="searchbar" onkeyup="search_nom()">
                    </form>

                    @if(isset($hasSearched) && $hasSearched) 
                        <a href="{{ route('joueur.liste') }}" class="btn btn-link mr-2">
                            <button class="btn btn-outline-primary" onclick="window.location.reload()">
                                <i class="mdi mdi-redo-variant"></i>
                            </button>                                        
                        </a>
                    @endif
                </div>
                
                <hr>

                <div class="d-flex align-items-center">
                    <h1 class="me-2" style="margin-right: 400px">Liste des joueurs</h1>
                    <a href="/dashboard/ajout" class="btn btn-primary">Ajouter un joueur</a>
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
                            <th class="noms">#</th>
                            <th class="noms">Nom</th>
                            <th class="noms">Prénom</th>
                            <th class="noms">Email</th>
                            <th class="noms">Catégorie</th>
                            <th class="noms">Sexe</th>
                            <th class="noms">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="playerTable">
                        @php
                            $ide = 1;
                        @endphp

                        @foreach($joueurs as $joueur)
                            <tr>
                                <td>{{ $ide }}</td>
                                <td class="noms">{{ $joueur->nom }}</td>
                                <td class="noms">{{ $joueur->prenom }}</td>
                                <td class="noms">{{ $joueur->email }}</td>
                                <td class="noms">{{ $joueur->categorie }}</td>
                                <td class="noms">{{ $joueur->sexe }}</td>
                                <td>
                                    <a href="/dashboard/update/{{ $joueur->id }}" class="btn btn-info"><span class="mdi mdi-pen"></span></a>
                                    <a href="#" class="btn btn-danger" onclick="confirmDelete('{{ $joueur->id }}')">
                                        <span class="mdi mdi-delete-forever"></span>
                                    </a>                                
                                </td>
                            </tr>

                            @php
                                $ide += 1;
                            @endphp
                        @endforeach
                    </tbody>
                </table>

                <br>

                

                <div class="container">
                    <canvas id="joueurChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function search_nom() {
        const input = document.getElementById('searchbar');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('playerTable');
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
        delete 
    */

    function confirmDelete(joueurId) {
        swal({
            title: "Êtes-vous sûr ?",
            text: "Vous allez supprimer ce joueur !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Oui, supprimer !",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                // Si l'utilisateur confirme, redirigez vers la suppression
                window.location.href = "/dashboard/delete/" + joueurId;
            }
        });
    }


</script>

<script src="/js/liste.js"></script>

@endsection
