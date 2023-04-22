@extends('layouts.base')

@section('title')
    Ajouter un étudiant
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

        @if ($errors)

        <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger"> {{ $error }} </li>
        @endforeach
        </ul>

        @endif

        <form action="/ajouter/traitement" method="post">
            @csrf
            <div class="mb-3">
                <label for="Nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="Nom" name="nom" aria-describedby="txtNom">
                <div id="txtNom" class="form-text">Saisissez le nom de l'étudiant.</div>
            </div>

            <div class="mb-3">
                <label for="Prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="Prenom" name="prenom" aria-describedby="txtPrenom">
                <div id="txtPrenom" class="form-text">Saisissez le prénom de l'étudiant.</div>
            </div>

            <div class="mb-3">
                <label for="Classe" class="form-label">Classe</label>
                <input type="text" class="form-control" id="Classe" name="classe" aria-describedby="txtClasse">
                <div id="txtClasse" class="form-text">Saisissez la classe de l'étudiant.</div>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter un étudiant</button>

            <br /> <br />
            <a href="/etudiants" class="btn btn-warning">Revenir à la liste des étudiants</a>

        </form>



    </div>
@endsection
