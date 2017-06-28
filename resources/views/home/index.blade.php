@extends('base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/vue-material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('body')

    <div id="app">

    </div>

    <script src="{{ mix('js/home.js') }}"></script>

@endsection

