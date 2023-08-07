@extends('layouts.layout')

@section('titulo-aba', 'Episódios')

@section('titulo-cabecalho')
    Episódios da temporada {{ $num_temporada }}
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

        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('temporadas.index', ['id' => $serieId]) }}" class="btn btn-secondary mt-4 mr-2">Voltar</a>
            <button class="btn btn-primary mt-4">Salvar</button>
        </div>
    </form>
@endsection
