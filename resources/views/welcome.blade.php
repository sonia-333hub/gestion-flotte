
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion de Flotte</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        body{
            margin:0;
            padding:0;
            font-family:Arial, Helvetica, sans-serif;
            background:#f4f6f9;
        }

        .hero{
            height:100vh;
            background:
                linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                url('{{ asset("images/flotte.jpg") }}');

            background-size:cover;
            background-position:center;

            color:white;

            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;
        }

        .hero h1{
            font-size:70px;
            font-weight:bold;
        }

        .hero p{
            font-size:22px;
        }

        .feature-card{
            border:none;
            border-radius:20px;
            transition:0.3s;
        }

        .feature-card:hover{
            transform:translateY(-10px);
        }

        .section{
            padding:80px 0;
        }

        footer{
            background:#212529;
            color:white;
            padding:20px;
            text-align:center;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">

    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            🚚 Gestion Flotte
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#services">
                        Services
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">
                        À propos
                    </a>
                </li>

                @auth

                    <li class="nav-item">
                        <a class="btn btn-primary ms-3" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                @else

                    <li class="nav-item">
                        <a class="btn btn-outline-light ms-3" href="{{ route('login') }}">
                            Connexion
                        </a>
                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<section class="hero">

    <div>

        <h1>
            Gestion de Flotte
        </h1>

        <p class="mt-4 mb-4">
            Gérez efficacement vos véhicules, chauffeurs et missions.
        </p>

        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5">
            Commencer
        </a>

    </div>

</section>

<section class="section" id="services">

    <div class="container">

        <div class="text-center mb-5">

            <h2>
                Fonctionnalités
            </h2>

            <p>
                Une plateforme moderne de gestion de transport.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="card feature-card shadow-lg p-4 text-center">

                    <i class="fa fa-truck fa-4x text-primary mb-3"></i>

                    <h4>
                        Gestion des véhicules
                    </h4>

                    <p>
                        Ajout, modification et suivi des véhicules.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card feature-card shadow-lg p-4 text-center">

                    <i class="fa fa-user fa-4x text-success mb-3"></i>

                    <h4>
                        Gestion des chauffeurs
                    </h4>

                    <p>
                        Affectation et suivi des chauffeurs.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card feature-card shadow-lg p-4 text-center">

                    <i class="fa fa-route fa-4x text-warning mb-3"></i>

                    <h4>
                        Gestion des missions
                    </h4>

                    <p>
                        Planification intelligente des trajets.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="section bg-light" id="about">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">

                <img src="{{ asset('images/transport.jpg') }}"
                     class="img-fluid rounded shadow">

            </div>

            <div class="col-md-6">

                <h2>
                    À propos du système
                </h2>

                <p class="mt-4">
                    Cette application permet de gérer efficacement une flotte de véhicules,
                    les chauffeurs, les missions et les statistiques de transport.
                </p>

                <p>
                    Elle offre une interface moderne et sécurisée adaptée aux entreprises.
                </p>

            </div>

        </div>

    </div>

</section>

<footer>

    © 2026 -AWATSA- Application de Gestion de Flotte

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
