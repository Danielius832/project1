<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Konferencijų sąrašas</title>
</head>
<body>
    <h1>Konferencijų sąrašas</h1>
    
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('admin.conferences.create') }}">Pridėti konferenciją</a>

    <ul>
        @foreach($conferences as $conference)
            <li>
                <strong>{{ $conference->name }}</strong> - {{ $conference->date }}
                <a href="{{ route('admin.conferences.edit', $conference->id) }}">Redaguoti</a>
                <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Ištrinti</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
