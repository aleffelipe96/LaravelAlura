@extends('layouts.layout')

@section('titulo-aba', 'Séries')

@section('titulo-cabecalho', 'Séries')

@section('conteudo')
    @if (!empty($mensagem))
        <div class="alert alert-success" role="alert">
            {{ $mensagem }}
        </div>
    @endif

    <a href="{{ route('series.criar') }}" class="btn btn-primary mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->id }} - {{ $serie->nome }}

                <span class="d-flex">
                    <a href="series/{{ $serie->id }}/temporadas" class="btn btn-info mr-1">
                        <i class="fa-solid fa-circle-info"></i>
                    </a>
                    <form action="series/{{ $serie->id }}" method="post">
                        @csrf
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
@endsection
