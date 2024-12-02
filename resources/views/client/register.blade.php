<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
</head>
<body>
    <h1>Registracijos forma</h1>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Vardas:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        <br>

        <label for="email">El. paštas:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        <br>

        <label for="password">Slaptažodis:</label>
        <input type="password" name="password" id="password" required>
        <br>

        <label for="password_confirmation">Pakartokite slaptažodį:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <br>

        <button type="submit">Registruotis</button>
    </form>

    <br>
    <p>Jau turite paskyrą? <a href="{{ route('login') }}">Prisijunkite čia</a></p>
</body>
</html>
