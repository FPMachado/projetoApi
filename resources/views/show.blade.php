@extends('templates.padrao')

@section('content')
    <h1> {{ $infoFilme['title'] }} </h1>
    <img src=" {{ $poster }} " alt="">
    <h3> Nota:{{ $infoFilme['vote_average'] }} </h3>
    <hr>
    <h2>Sinopse</h2>
    {{ $infoFilme['overview'] }}
@endsection
