<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Konferencija</title>
</head>
<body>
    <h1>Konferencija {{ $id }}</h1>
    <!-- Čia bus rodomi konferencijos duomenys pagal ID -->
    <p>Aprašymas: Konferencijos aprašymas</p>
    <form action="{{ route('client.register', ['id' => $id]) }}" method="POST">
        @csrf
        <button type="submit">Registruotis</button>
    </form>
</body>
</html>
