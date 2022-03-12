@extends('layouts.layout')

@section('titulo-aba', 'Séries')

@section('titulo-cabecalho', 'Séries')

@section('conteudo')
    @include('mensagem', ['mensagem' => $mensagem])

    <a href="{{ route('series.criar') }}" class="btn btn-primary mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                            <i class="fa-solid fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <span class="d-flex">
                    <a href="series/{{ $serie->id }}/temporadas" class="btn btn-info mr-1">
                        <i class="fa-solid fa-circle-info"></i>
                    </a>

                    <button class="btn btn-secondary mr-1" onclick="toggleInput({{ $serie->id }})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <form
                        action="series/{{ $serie->id }}"
                        method="post"
                        onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($serie->nome) }}?')"
                    >
                        @csrf
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>

    <script>
        function toggleInput(serieId) {
            const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
            const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
            if (nomeSerieEl.hasAttribute('hidden')) {
                nomeSerieEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
            } else {
                inputSerieEl.removeAttribute('hidden');
                nomeSerieEl.hidden = true;
            }
        }

        function editarSerie(serieId) {
            let formData = new FormData();
            const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
            const token = document.querySelector(`input[name="_token"]`).value;

            formData.append('nome', nome);
            formData.append('_token', token);

            const url = `/series/${serieId}/editaNome`;

            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(serieId);
                document.getElementById(`nome-serie-${serieId}`).textContent = nome;
            });
        }
    </script>
@endsection
