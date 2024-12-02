<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Pridėti konferenciją</title>
</head>
<body>
    <h1>Pridėti konferenciją</h1>

    <form action="{{ route('admin.conferences.store') }}" method="POST">
        @csrf
        <label for="name">Konferencijos pavadinimas:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="date">Data:</label>
        <input type="date" name="date" id="date" required>
        
        <button type="submit">Sukurti</button>
    </form>
</body>
</html>
