<?php

@extends('layouts.app')

@section('content')
    <h1>Kurti naują konferenciją</h1>
    <form action="{{ route('conferences.store') }}" method="POST">
        @csrf
        <label for="name">Pavadinimas</label>
        <input type="text" name="name" id="name" required>
        <label for="description">Aprašymas</label>
        <textarea name="description" id="description" required></textarea>
        <label for="date">Data</label>
        <input type="date" name="date" id="date" required>
        <label for="location">Vieta</label>
        <input type="text" name="location" id="location" required>
        <button type="submit">Kurti konferenciją</button>
    </form>
@endsection
