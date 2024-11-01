@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Profil</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image de Profil</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>


<form action="{{ route('profile.delete') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?');">
    @csrf
    <button type="submit" class="btn btn-danger">Supprimer le compte</button>
</form>



@endsection
