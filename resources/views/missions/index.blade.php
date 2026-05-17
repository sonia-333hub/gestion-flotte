@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h3 class="fw-bold">
                    Liste des missions
                </h3>

                <a href="{{ route('missions.create') }}"
                   class="btn btn-primary">

                    <i class="fa fa-plus"></i>
                    Nouvelle mission

                </a>

            </div>

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Véhicule</th>
                        <th>Chauffeur</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($missions as $m)

                    <tr>

                        <td>
                            {{ $m->id }}
                        </td>

                        <td>

                            <span class="badge bg-primary">

                                {{ $m->vehicle->immatriculation }}

                            </span>

                        </td>

                        <td>

                            {{ $m->driver->nom }}

                        </td>

                        <td>

                            {{ $m->destination }}

                        </td>

                        <td>

                            {{ $m->date_mission }}

                        </td>

                        <td>

                            @if($m->statut_auto == 'En attente')

                                <span class="badge bg-warning text-dark">

                                    En attente

                                </span>

                            @elseif($m->statut_auto == 'En cours')

                                <span class="badge bg-info text-dark">

                                    En cours

                                </span>

                            @else

                                <span class="badge bg-success">

                                    Terminée

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('missions.edit', $m->id) }}"
                               class="btn btn-warning btn-sm">

                                Modifier

                            </a>

                            @if(auth()->user()->role == 'admin')

                            <form action="{{ route('missions.destroy', $m->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer cette mission ?')">

                                    Supprimer

                                </button>

                            </form>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center text-muted">

                            Aucune mission enregistrée

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection