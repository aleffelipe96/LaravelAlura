@extends('layouts.layout')

@section('titulo-aba', 'Episódios')

@section('titulo-cabecalho')
    Episódios da temporada {{ $temporadaId }}
@endsection

@section('conteudo')
    @include('mensagem', ['mensagem' => $mensagem])

    <form action="/temporadas/{{ $temporadaId }}/episodios/assistir" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{ $episodio->numero_episodio }}
                <input type="checkbox" name="episodio[{{ $episodio->id }}][assistido]"
                    {{ $episodio->assistido ? 'checked' : '' }}
                >
            </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-2 mb-5">Salvar</button>
    </form>
@endsection
