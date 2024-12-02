<!-- resources/views/employees/index.blade.php -->
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Darbuotojų sąrašas</title>
</head>
<body>
    <h1>Darbuotojų sąrašas</h1>
    <ul>
        @foreach ($employees as $employee)
            <li>{{ $employee->name }}</li>
        @endforeach
    </ul>
</body>
</html>
