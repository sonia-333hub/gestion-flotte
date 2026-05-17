@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow p-4">

        <h2 class="mb-4">
            Modifier chauffeur
        </h2>

        <form action="{{ route('drivers.update', $driver->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <input type="text"
                   name="nom"
                   value="{{ $driver->nom }}"
                   class="form-control mb-3"
                   placeholder="Nom">

            <input type="text"
                   name="prenom"
                   value="{{ $driver->prenom }}"
                   class="form-control mb-3"
                   placeholder="Prénom">

            <input type="text"
                   name="telephone"
                   value="{{ $driver->telephone }}"
                   class="form-control mb-3"
                   placeholder="Téléphone">

            <input type="text"
                   name="permis"
                   value="{{ $driver->permis }}"
                   class="form-control mb-3"
                   placeholder="Permis">

            <button class="btn btn-success">

                Mettre à jour

            </button>

        </form>

    </div>

</div>

@endsection