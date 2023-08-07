@extends('layouts.layout')

@section('titulo-aba', 'Login')

@section('titulo-cabecalho', 'Login')

@section('conteudo')
    @include('erros', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary mt-4 mr-2">Entrar</button>
            <a href="registrar" class="btn btn-secondary mt-4">Registrar-se</a>
        </div>
    </form>
@endsection
