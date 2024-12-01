<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Konferencijų sąrašas</title>
</head>
<body>
    <h1>Visos konferencijos</h1>
    <ul>
        <li><a href="{{ route('client.conference', ['id' => 1]) }}">Konferencija 1</a></li>
        <li><a href="{{ route('client.conference', ['id' => 2]) }}">Konferencija 2</a></li>
        <!-- Galite dinamiškai užpildyti šį sąrašą iš duomenų bazės -->
    </ul>
</body>
</html>
