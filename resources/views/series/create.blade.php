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

    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-3">
                <label for="nome">Nome da Série</label>
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

            <div class="col col-5">
                <label for="capa">Capa</label>
                <input
                    type="file"
                    class="form-control"
                    name="capa"
                    id="capa"
                >
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('series.index') }}" class="btn btn-secondary mt-4 mr-2">Voltar</a>
            <button class="btn btn-primary mt-4">Adicionar</button>
        </div>
    </form>
@endsection
