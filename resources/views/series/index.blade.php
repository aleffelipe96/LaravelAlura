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
                {{ $serie->nome }}
                <form action="series/{{ $serie->id }}" method="post">
                    @csrf
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
