@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
    <!--div class="container">
                <h1>Créer une Nouvelle Partie</h1>
            
                <form action="{{ route('games.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre de la Partie</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Date et Heure de Début</label>
                        <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
                        @error('start_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Date et Heure de Fin (optionnel)</label>
                        <input type="datetime-local" name="end_time" id="end_time" class="form-control">
                        @error('end_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="status" class="form-label">Statut</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="upcoming">À Venir</option>
                            <option value="ongoing">En Cours</option>
                            <option value="finished">Terminé</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <button type="submit" class="btn btn-primary">Créer la Partie</button>
                </form>

                <a href="/games/list" class="btn btn-danger mt-3">Retour à la Liste des Parties</a>

    </div-->

    <div class="row justify-content-center">

            @if (session('status'))
                <div class="alert alert-success" role="alert" style="width: 100%; text-align: center">
                    {{ session('status') }}
                </div>
                <br>
            @endif

        <h1 class="container text-center">Créer une Nouvelle Partie</h1>

        <div class="col-md-6 grid-margin stretch-card">

          <div class="card">
                              
                

            <div class="card-body">

              <form class="forms-sample" action="{{ route('games.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="title" class="form-label">Titre de la Partie</label>
                  <input type="text" name="title" id="title" class="form-control" required>

                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="start_time" class="form-label">Date et Heure de Début</label>
                    <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>

                    @error('start_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="end_time" class="form-label">Date et Heure de Fin (optionnel)</label>
                    <input type="datetime-local" name="end_time" id="end_time" class="form-control">

                    @error('end_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="status" class="form-label">Statut</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="upcoming">À Venir</option>
                        <option value="ongoing">En Cours</option>
                        <option value="finished">Terminé</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!--select id="monthSelector">
                    <option value="1">Janvier</option>
                    <option value="2">Février</option>
                    <option value="3">Mars</option>
                    <option value="4">Avril</option>
                    <option value="5">Mai</option>
                    <option value="6">Juin</option>
                    <option value="7">Juillet</option>
                    <option value="8">Août</option>
                    <option value="9">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Décembre</option>
                </select-->
                <button type="submit" class="btn btn-primary mr-2">Créer la partie</button>
                <a href="/games" class="btn btn-danger">Revenir à la liste des parties </a>
              </form>
            </div>
          </div>
        </div>
    </div>


    </div>

</div>
@endsection