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
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
