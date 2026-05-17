<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Chauffeur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h1 class="mb-4">Ajouter un chauffeur</h1>

    <form action="{{ route('drivers.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control">
        </div>

        <div class="mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control">
        </div>

        <div class="mb-3">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Permis</label>
            <input type="text" name="permis" class="form-control">
        </div>

        <button class="btn btn-success">
            Enregistrer
        </button>

        <a href="{{ route('drivers.index') }}" class="btn btn-secondary">
            Retour
        </a>

    </form>

</body>
</html>