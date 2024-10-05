@extends('layouts.app')

@section('title', 'Afebas - Admin IDEA')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <!--div class="row">
            <div class="col s12">
                <h1 class="container text-center">Ajouter un joueur</h1>
                <hr>
                @if (session('status'))

                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    
                @endif

                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
                
                <form action="/ajout/traitement" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="nom" class="form-label">Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
                      </div>
                    <div class="form-group">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">AJOUTER UN JOUEUR</button>
                    <hr>
                    <a href="/dashboard/liste" class="btn btn-danger">Revenir à la liste des joueurs </a>
                </form>
            </div>
        </div-->
        <div class="row justify-content-center">
            <h1 class="container text-center">Modifier un joueur</h1>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="/update/traitement" method="POST">
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