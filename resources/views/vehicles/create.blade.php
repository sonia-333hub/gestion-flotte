<!DOCTYPE html>
<html>
<head>
    <title>Ajouter véhicule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Ajouter un véhicule</h2>

<form action="{{ route('vehicles.store') }}" method="POST">
    @csrf

    <input class="form-control mb-2" type="text" name="immatriculation" placeholder="Immatriculation">
    <input class="form-control mb-2" type="text" name="marque" placeholder="Marque">
    <input class="form-control mb-2" type="text" name="modele" placeholder="Modèle">
    <input class="form-control mb-2" type="number" name="capacite" placeholder="Capacité">

    <select name="statut" class="form-control mb-3">

    <option value="Disponible">
        Disponible
    </option>

    <option value="En mission">
        En mission
    </option>

    <option value="Maintenance">
        Maintenance
    </option>

</select>
<button class="btn btn-success">Enregistrer</button>
</form>

</body>
</html>