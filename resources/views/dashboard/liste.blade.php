@extends('layouts.app')

@section('title', 'Afebas - Admin IDEA')

@section('content')
                <div class="content-wrapper">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col s12">

                                <div class="form-inline mb-3"> 
                                    <form class="search d-flex" action="{{ route('joueur.search') }}" method="GET" method="GET" style="max-width: 400px; width: 100%; margin-right: 400px">
                                        <input type="text" name="query" class="form-control me-2" placeholder="Rechercher un joueur" required style="width: 100%;">
                                        <button type="submit" class="btn btn-primary">Rechercher</button>
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
                                    <a href="/dashboard/ajout" class="btn btn-primary">ajouter un joueur</a>
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
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $ide = 1;
                                        @endphp

                                        @foreach($joueurs as $joueur)
                                            <tr>
                                                <td>{{ $ide }}</td>
                                                <td>{{ $joueur->nom }}</td>
                                                <td>{{ $joueur->prenom }}</td>
                                                <td>{{ $joueur->email }}</td>
                                                <td>
                                                    <a href="/dashboard/update/{{ $joueur->id }}" class="btn btn-info"><span class="mdi mdi-pen"></span></a>
                                                    <a href="/dashboard/delete/{{ $joueur->id }}" class="btn btn-danger"><span class="mdi mdi-delete-forever"></a>
                                                </td>
                                            </tr>

                                            @php
                                                $ide += 1;
                                            @endphp
                                            
                                        @endforeach
                                    </tbody>
                                </table>

                                <br>

                                {{ $joueurs->links() }}

                                <div class="container">
                                    <canvas id="joueurChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
