@extends('layouts.base')

@section('title')
    Liste des étudiants
@endsection


@section('content')
    <hr>

    <h1>@yield('title')</h1>

    <a href="/ajouter" class="btn btn-primary">Ajouter un étudiant</a>


    <br /> <br />

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $it = 1;
                @endphp
                @foreach ($etudiants as $etudiant)

                <tr>
                    <th scope="row">{{ $it }}</th>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->classe }}</td>
                    <td>
                        <a href="/update/{{ $etudiant->id}}" class="btn btn-info">Update</a>
                        <a href="/delete/{{ $etudiant->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @php
                    $it += 1;
                @endphp
                @endforeach
            </tbody>
        </table>
        {{ $etudiants->links() }}
    </div>
@endsection
