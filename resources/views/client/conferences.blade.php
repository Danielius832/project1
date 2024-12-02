<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visos konferencijos</title>
    <!-- Bootstrap CSS (galite naudoti savo versiją arba CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h1 class="text-center">Visos konferencijos</h1>

    <!-- Sėkmės ir klaidos pranešimai -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Jei nėra konferencijų -->
    @if ($conferences->isEmpty())
        <p class="text-center">Šiuo metu nėra planuojamų konferencijų.</p>
    @else
        <div class="list-group">
            @foreach ($conferences as $conference)
                <div class="list-group-item">
                    <h5><strong>{{ $conference->name }}</strong></h5>
                    <p><strong>Data:</strong> {{ $conference->date }}</p>
                    <p><strong>Vieta:</strong> {{ $conference->location }}</p>

                    <!-- Registracijos mygtukas -->
                    <form action="{{ route('client.register', ['id' => $conference->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Registruotis</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Bootstrap JS (galite naudoti savo versiją arba CDN) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
