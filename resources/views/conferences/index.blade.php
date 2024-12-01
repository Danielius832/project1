<?php

@extends('layouts.app')

@section('content')
    <h1>Konferencijos</h1>
    <a href="{{ route('conferences.create') }}">Kurti naują konferenciją</a>
    <ul>
        @foreach ($conferences as $conference)
            <li>
                <a href="{{ route('conferences.show', $conference->id) }}">{{ $conference->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
