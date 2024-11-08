@extends('layouts.app')

@section('title', 'Afebas - Admin IDEA')

@section('content')
<div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-center">
            <h1 class="container text-center">Modifier un joueur</h1>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!--form class="forms-sample" action="/update/traitement" method="POST"-->
                  <form class="forms-sample" action="{{ route('joueur.update.traitement') }}" method="POST">

                    @csrf
                    <input type="text" name="id" style="display: none" value="{{ $joueurs->id }}">
                    <div class="form-group">
                      <label for="nom">Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom" value="{{ $joueurs->nom }}">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $joueurs->prenom }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ $joueurs->email }}">
                    </div>

                    <div class="form-group">
                      <label for="categorie">Catégorie</label>
                      <input class="form-control" type="text" id="categorie" name="categorie" value="{{ $joueurs->categorie }}">
                    </div>
                    <div class="form-group">
                      <label for="sexe">Sexe</label>
                      <select class="js-example-basic-single" style="width:100%" id="sexe" name="sexe" value="{{ $joueurs->sexe }}">
                          <option value="">Sélectionnez un sexe</option>
                          <option value="homme" {{ $joueurs->sexe == 'homme' ? 'selected' : '' }}>Homme</option>
                          <option value="femme" {{ $joueurs->sexe == 'femme' ? 'selected' : '' }}>Femme</option>
                      </select>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                    <a href="/dashboard/liste" class="btn btn-danger">Revenir à la liste des joueurs </a>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection