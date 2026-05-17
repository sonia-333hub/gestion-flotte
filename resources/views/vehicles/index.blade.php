@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="fw-bold">
                    Liste des véhicules
                </h2>

                <a href="{{ route('vehicles.create') }}"
                   class="btn btn-primary">

                    Ajouter un véhicule

                </a>

            </div>

            <table class="table table-hover align-middle">

                <thead class="table-primary">

                    <tr>

                        <th>Immatriculation</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Capacité</th>
                        <th>Statut</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($vehicles as $v)

                    <tr>

                        <td>

                            <span class="badge bg-dark">

                                {{ $v->immatriculation }}

                            </span>

                        </td>

                        <td>
                            {{ $v->marque }}
                        </td>

                        <td>
                            {{ $v->modele }}
                        </td>

                        <td>
                            {{ $v->capacite }}
                        </td>

                        <td>

                            @if($v->statut == 'Disponible')

                                <span class="badge bg-success">

                                    Disponible

                                </span>

                            @elseif($v->statut == 'En mission')

                                <span class="badge bg-warning text-dark">

                                    En mission

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Maintenance

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('vehicles.edit', $v->id) }}"
                               class="btn btn-warning btn-sm">

                                Modifier

                            </a>

                            @if(auth()->user()->role == 'admin')

                            <form action="{{ route('vehicles.destroy', $v->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer ce véhicule ?')">

                                    Supprimer

                                </button>

                            </form>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center text-muted">

                            Aucun véhicule enregistré

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection