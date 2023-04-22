@extends('layouts.base')

@section('title')
    Modifier un étudiant
@endsection


@section('content')
    <hr>

    <h1>@yield('title')</h1>

    <br /> <br />

    <div class="row">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="/update/traitement" method="post">
            @csrf
            <input type="text" name="id" value="{{ $etudiant->id }}" style="display: none;">
            
            <div class="mb-3">
                <label for="Nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="Nom" name="nom" value="{{ $etudiant->nom }}" aria-describedby="txtNom">
                <div id="txtNom" class="form-text">Saisissez le nom de l'étudiant.</div>
            </div>

            <div class="mb-3">
                <label for="Prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="Prenom" name="prenom" value="{{ $etudiant->prenom }}" aria-describedby="txtPrenom">
                <div id="txtPrenom" class="form-text">Saisissez le prénom de l'étudiant.</div>
            </div>

            <div class="mb-3">
                <label for="Classe" class="form-label">Classe</label>
                <input type="text" class="form-control" id="Classe" name="classe" value="{{ $etudiant->classe }}" aria-describedby="txtClasse">
                <div id="txtClasse" class="form-text">Saisissez la classe de l'étudiant.</div>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>

            <br /> <br />
            <a href="/etudiants" class="btn btn-warning">Revenir à la liste des étudiants</a>

        </form>



    </div>
@endsection
