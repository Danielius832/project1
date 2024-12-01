<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konferencijų sistema</title>

    <!-- Pridedame Bootstrap stiliaus biblioteką per CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Galite pridėti savo CSS failus, jei reikia -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header class="mt-4">
            <h1 class="text-center">Konferencijų sistema</h1>
            <p class="text-center">Vardas: Danielius Kisel, Grupė: Tavo grupės numeris</p>
        </header>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="list-group">
                    <a href="{{ route('client.conferences') }}" class="list-group-item list-group-item-action">
                        Kliento posistemis
                    </a>
                    <a href="{{ route('employee.index') }}" class="list-group-item list-group-item-action">
                        Darbuotojo posistemis
                    </a>
                    <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action">
                        Administratoriaus posistemis
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Pridedame Bootstrap JavaScript biblioteką per CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Galite pridėti savo JavaScript failus, jei reikia -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
