@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">
        Tableau de bord
    </h1>

    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card bg-primary text-white shadow-lg border-0 rounded-4">

                <div class="card-body text-center">

                    <i class="fa fa-truck fa-3x mb-3"></i>

                    <h2>{{ $vehicles }}</h2>

                    <p>Véhicules</p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card bg-success text-white shadow-lg border-0 rounded-4">

                <div class="card-body text-center">

                    <i class="fa fa-user fa-3x mb-3"></i>

                    <h2>{{ $drivers }}</h2>

                    <p>Chauffeurs</p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card bg-warning text-white shadow-lg border-0 rounded-4">

                <div class="card-body text-center">

                    <i class="fa fa-route fa-3x mb-3"></i>

                    <h2>{{ $missions }}</h2>

                    <p>Missions</p>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body">

                    <h4 class="mb-4">
                        Diagramme des statistiques
                    </h4>

                    <div style="height:400px;">

                        <canvas id="fleetChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body">

                    <h4 class="mb-4">
                        Activités récentes
                    </h4>

                    <div class="list-group">

                        <div class="list-group-item">
                            Véhicule ajouté
                        </div>

                        <div class="list-group-item">
                            Chauffeur enregistré
                        </div>

                        <div class="list-group-item">
                            Mission créée
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('fleetChart');

    new Chart(ctx, {

        type: 'doughnut',

        data: {

            labels: [
                'Véhicules',
                'Chauffeurs',
                'Missions'
            ],

            datasets: [{

                data: [
                    {{ $vehicles }},
                    {{ $drivers }},
                    {{ $missions }}
                ],

                borderWidth: 2

            }]
        },

        options: {

            responsive: true,

            maintainAspectRatio: false

        }

    });

});

</script>

@endsection