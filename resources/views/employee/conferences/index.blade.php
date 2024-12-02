<!-- resources/views/employee/conferences/index.blade.php -->

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Konferencijų sąrašas</title>
</head>
<body>
    <h1>Konferencijų sąrašas</h1>

    @if ($conferences->isEmpty())
        <p>Šiuo metu nėra konferencijų.</p>
    @else
        <ul>
            @foreach ($conferences as $conference)
                <li>
                    <strong>{{ $conference->name }}</strong> - {{ $conference->date }}
                    <a href="{{ route('employee.conference', $conference->id) }}">Žiūrėti registruotus klientus</a>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
