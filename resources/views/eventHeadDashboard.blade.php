@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('eventHead/src/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/loaders/loaders.min.css') }}">
    <script src="{{ asset('react/react.js') }}" crossorigin></script>
    <script src="{{ asset('react/react-dom.js') }}" crossorigin></script>
    <script src="{{ asset('react/babel.js') }}"></script>
    <script src="{{ asset('react/axios.js') }}"></script>

    <style>
        .shadow {
            box-shadow: 1px 1px 5px rgb(143, 143, 143) !important;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 2px;
        }
    </style>
@endsection
    @section('content')
        <div id="root"></div>
    @endsection

@section('js')
    <script src="{{ asset('eventHead/src/App.js') }}" type="text/babel"></script>
@endsection