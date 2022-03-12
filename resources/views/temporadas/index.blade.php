@extends('layouts.layout')

@section('titulo-aba', 'Temporadas')

@section('titulo-cabecalho')
    Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/temporadas/{{ $temporada->id }}/episodios">
                    Temporada {{ $temporada->numero_temporada }}
                </a>
                <span class="badge badge-secondary">
                    {{ $temporada->episodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection
