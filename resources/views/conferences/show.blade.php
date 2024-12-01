<?php
@extends('layouts.app')

@section('content')
    <h1>{{ $conference->name }}</h1>
    <p>{{ $conference->description }}</p>
    <p>{{ $conference->date }}</p>
    <p>{{ $conference->location }}</p>
@endsection
