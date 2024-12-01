<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee - Conferences</title>
</head>
<body>
    <h1>Employee Conferences</h1>
    <ul>
        @foreach ($conferences as $conference)
            <li>
                <strong>{{ $conference['name'] }}</strong> - {{ $conference['date'] }}
            </li>
        @endforeach
    </ul>
</body>
</html>
