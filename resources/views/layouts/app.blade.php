<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Gestion Flotte
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        body{
            background:#f4f6f9;
            font-family:Arial, Helvetica, sans-serif;
        }

        /*
        |-----------------------------------------
        | SIDEBAR
        |-----------------------------------------
        */

        .sidebar{

            height:100vh;

            background:linear-gradient(
                180deg,
                #0d6efd,
                #212529
            );

            color:white;

            position:fixed;

            width:260px;

            padding-top:20px;

            box-shadow:0 0 20px rgba(
                0,0,0,0.2
            );

        }

        .sidebar h3{

            font-weight:bold;

        }

        .sidebar a{

            color:white;

            text-decoration:none;

            display:block;

            padding:15px 20px;

            margin:5px 10px;

            border-radius:10px;

            transition:0.3s;

        }

        .sidebar a:hover{

            background:white;

            color:#0d6efd;

            transform:translateX(5px);

        }

        .sidebar i{

            margin-right:10px;

        }

        /*
        |-----------------------------------------
        | CONTENT
        |-----------------------------------------
        */

        .content{

            margin-left:270px;

            padding:25px;

        }

        /*
        |-----------------------------------------
        | CARDS
        |-----------------------------------------
        */

        .card-dashboard{

            border:none;

            border-radius:20px;

            box-shadow:0 0 15px rgba(
                0,0,0,0.1
            );

            transition:0.3s;

        }

        .card-dashboard:hover{

            transform:translateY(-5px);

        }

        /*
        |-----------------------------------------
        | USER BOX
        |-----------------------------------------
        */

        .user-box{

            background:rgba(
                255,255,255,0.1
            );

            margin:15px;

            padding:15px;

            border-radius:15px;

            text-align:center;

        }

        /*
        |-----------------------------------------
        | ROLE BADGES
        |-----------------------------------------
        */

        .badge-admin{

            background:#dc3545;

        }

        .badge-gestionnaire{

            background:#ffc107;

            color:black;

        }

        .badge-chauffeur{

            background:#198754;

        }

        /*
        |-----------------------------------------
        | FOOTER
        |-----------------------------------------
        */

        .footer{

            position:absolute;

            bottom:10px;

            width:100%;

            text-align:center;

            font-size:13px;

            color:#ddd;

        }

    </style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <h3 class="text-center mb-4">
        🚚 Gestion Flotte
    </h3>

    <!-- USER CONNECTÉ -->

    <div class="user-box">

        <h5>

            {{ auth()->user()->name }}

        </h5>

        @if(auth()->user()->role == 'admin')

            <span class="badge badge-admin">

                ADMIN

            </span>

        @elseif(auth()->user()->role == 'gestionnaire')

            <span class="badge badge-gestionnaire">

                GESTIONNAIRE

            </span>

        @else

            <span class="badge badge-chauffeur">

                CHAUFFEUR

            </span>

        @endif

    </div>

    <!-- DASHBOARD -->

    <a href="{{ route('dashboard') }}">

        <i class="fa fa-home"></i>

        Dashboard

    </a>

    <!-- ADMIN -->

    @if(auth()->user()->role == 'admin')

        <a href="{{ route('vehicles.index') }}">

            <i class="fa fa-truck"></i>

            Véhicules

        </a>

        <a href="{{ route('drivers.index') }}">

            <i class="fa fa-user"></i>

            Chauffeurs

        </a>

        <a href="{{ route('missions.index') }}">

            <i class="fa fa-route"></i>

            Missions

        </a>

    <!-- GESTIONNAIRE -->

    @elseif(auth()->user()->role == 'gestionnaire')

        <a href="{{ route('vehicles.index') }}">

            <i class="fa fa-truck"></i>

            Véhicules

        </a>

        <a href="{{ route('missions.index') }}">

            <i class="fa fa-route"></i>

            Missions

        </a>

    <!-- CHAUFFEUR -->

    @else

        <a href="{{ route('missions.index') }}">

            <i class="fa fa-route"></i>

            Mes missions

        </a>

    @endif

    <!-- LOGOUT -->

    <form method="POST"
          action="{{ route('logout') }}"
          class="p-3">

        @csrf

        <button class="btn btn-danger w-100 rounded-pill">

            <i class="fa fa-sign-out-alt"></i>

            Déconnexion

        </button>

    </form>

    <!-- FOOTER -->

    <div class="footer">

        Gestion Flotte © 2026

    </div>

</div>

<!-- CONTENT -->

<div class="content">

    @yield('content')

</div>

</body>

</html>