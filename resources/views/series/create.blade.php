@extends('layouts.layout')

@section('titulo-aba', 'Adicionar Série')

@section('titulo-cabecalho', 'Adicionar Série')

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input
                    type="text"
                    class="form-control"
                    name="nome"
                    id="nome"
                >
            </div>

            <div class="col col-2">
                <label for="qtd_temporadas">Nº de Temporadas</label>
                <input
                    type="number"
                    class="form-control"
                    name="qtd_temporadas"
                    id="qtd_temporadas"
                    min="1"
                >
            </div>

            <div class="col col-2">
                <label for="qtd_episodios">Nº de Episódios</label>
                <input
                    type="number"
                    class="form-control"
                    name="qtd_episodios"
                    id="qtd_episodios"
                    min="1"
                >
            </div>
        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
