<!-- resources/views/admin/users/index.blade.php -->

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Naudotojų sąrašas</title>
</head>
<body>
    <h1>Naudotojų sąrašas</h1>

    <ul>
        @foreach($users as $user)
            <li>
                <strong>{{ $user->name }}</strong> - {{ $user->email }}
                <a href="{{ route('admin.users.edit', $user->id) }}">Redaguoti</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
