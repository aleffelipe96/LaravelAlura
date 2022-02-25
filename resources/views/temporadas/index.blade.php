@extends('layouts.layout')

@section('titulo-aba', 'Temporadas')

@section('titulo-cabecalho')
    Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item">
                Temporada {{ $temporada->numero_temporada }}
            </li>
        @endforeach
    </ul>
@endsection
