@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="fw-bold">
                    Liste des chauffeurs
                </h2>

                <a href="{{ route('drivers.create') }}"
                   class="btn btn-success">

                    Ajouter un chauffeur

                </a>

            </div>

            <table class="table table-hover align-middle">

                <thead class="table-success">

                    <tr>

                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Permis</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($drivers as $d)

                    <tr>

                        <td>
                            {{ $d->nom }}
                        </td>

                        <td>
                            {{ $d->prenom }}
                        </td>

                        <td>
                            {{ $d->telephone }}
                        </td>

                        <td>
                            {{ $d->permis }}
                        </td>

                        <td>

                            <a href="{{ route('drivers.edit', $d->id) }}"
                               class="btn btn-warning btn-sm">

                                Modifier

                            </a>

                            @if(auth()->user()->role == 'admin')

                            <form action="{{ route('drivers.destroy', $d->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer ce chauffeur ?')">

                                    Supprimer

                                </button>

                            </form>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="text-center text-muted">

                            Aucun chauffeur enregistré

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection