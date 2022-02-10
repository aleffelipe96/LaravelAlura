@extends('layouts.layout')

@section('titulo-aba', 'Séries')

@section('titulo-cabecalho', 'Séries')

@section('conteudo')
    <a href="series/criar" class="btn btn-primary mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie }}</li>
        @endforeach
    </ul>
@endsection
