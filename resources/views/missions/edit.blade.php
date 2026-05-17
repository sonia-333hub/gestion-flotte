@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow p-4">

        <h2 class="mb-4">
            Modifier mission
        </h2>

        <form action="{{ route('missions.update', $mission->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <label class="mb-2">
                Véhicule
            </label>

            <select name="vehicle_id"
                    class="form-control mb-3">

                @foreach($vehicles as $v)

                    <option value="{{ $v->id }}"
                        {{ $mission->vehicle_id == $v->id ? 'selected' : '' }}>

                        {{ $v->immatriculation }}

                    </option>

                @endforeach

            </select>

            <label class="mb-2">
                Chauffeur
            </label>

            <select name="driver_id"
                    class="form-control mb-3">

                @foreach($drivers as $d)

                    <option value="{{ $d->id }}"
                        {{ $mission->driver_id == $d->id ? 'selected' : '' }}>

                        {{ $d->nom }}

                    </option>

                @endforeach

            </select>

            <input type="text"
                   name="destination"
                   value="{{ $mission->destination }}"
                   class="form-control mb-3"
                   placeholder="Destination">

            <input type="date"
                   name="date_mission"
                   value="{{ $mission->date_mission }}"
                   class="form-control mb-3">

            <button class="btn btn-success">

                Mettre à jour

            </button>

        </form>

    </div>

</div>

@endsection