@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Nouvelle mission
</h2>

<form action="{{ route('missions.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">

        <label>Véhicule</label>

        <select name="vehicle_id"
                class="form-control">

            @foreach($vehicles as $v)

            <option value="{{ $v->id }}">

                {{ $v->immatriculation }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Chauffeur</label>

        <select name="driver_id"
                class="form-control">

            @foreach($drivers as $d)

            <option value="{{ $d->id }}">

                {{ $d->nom }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Destination</label>

        <input type="text"
               name="destination"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Date mission</label>

        <input type="date"
               name="date_mission"
               class="form-control">

    </div>

    <button class="btn btn-success">

        Enregistrer

    </button>

</form>

@endsection