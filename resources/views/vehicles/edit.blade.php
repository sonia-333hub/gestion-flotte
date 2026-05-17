<!DOCTYPE html>
<html>
<head>
    <title>Modifier véhicule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Modifier véhicule</h2>

<form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input class="form-control mb-2" type="text" name="immatriculation" value="{{ $vehicle->immatriculation }}">
    <input class="form-control mb-2" type="text" name="marque" value="{{ $vehicle->marque }}">
    <input class="form-control mb-2" type="text" name="modele" value="{{ $vehicle->modele }}">
    <input class="form-control mb-2" type="number" name="capacite" value="{{ $vehicle->capacite }}">

    <button class="btn btn-primary">Modifier</button>
</form>

</body>
</html>