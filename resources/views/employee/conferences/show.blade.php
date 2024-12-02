

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>{{ $conference->name }} - Registruoti klientai</title>
</head>
<body>
    <h1>{{ $conference->name }} - Registruoti klientai</h1>
    
    <h3>Klientai, užsiregistravę į šią konferenciją:</h3>

    @if ($clients->isEmpty())
        <p>Šiuo metu nėra užsiregistravusių klientų.</p>
    @else
        <ul>
            @foreach ($clients as $client)
                <li>{{ $client->name }} ({{ $client->email }})</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('employee.conferences') }}">Grįžti į konferencijų sąrašą</a>
</body>
</html>
