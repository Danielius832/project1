<ul>
    @foreach ($conferences as $conference)
        <li>
            <strong>{{ $conference->name }}</strong> - {{ $conference->date }}
            <form action="{{ route('client.register', ['id' => $conference->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Registruotis</button>
            </form>
        </li>
    @endforeach
</ul>
