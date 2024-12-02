


@extends('layouts.app')

@section('content')
    <h1>Konferencijų sąrašas</h1>
    
    @if ($conferences->isEmpty())
        <p>Šiuo metu nėra planuojamų konferencijų.</p>
    @else
        <ul>
            @foreach ($conferences as $conference)
                <li>{{ $conference->name }} - {{ $conference->date }}</li>
            @endforeach
        </ul>
    @endif
@endsection
