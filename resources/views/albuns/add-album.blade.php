@extends('layout.femaster')

@section('content')
    <main>
        <div class="container">
            <h2>Adicionar albuns</h2>

            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif



            <form method="POST" action="{{ route('albuns.createAlbum') }}" enctype="multipart/form-data">
                @csrf
                @csrf
                <div class="mb-3">
                    <label for="nomealbum" class="form-label">Nome Album</label>
                    <input type="text" value="{{ old('nome_album') }}" name="nome_album" class="form-control" id="nomealbum"
                        placeholder="Nome do Album">
                </div>
                <div class="mb-3">
                    <label for="datalancamento" class="form-label">Data de Lançamento</label>
                    <input type="date" value="{{ old('lancamento') }}" name="lancamento" class="form-control"
                        id="datalancamento" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="imagemalbum" class="form-label">Upload Album Foto</label>
                    <input name="imagem_album" value="{{ old('imagem_album') }}" class="form-control form-control-sm"
                        id="imagemalbum" type="file">
                </div>

                <div class="mb-3">
                    <label for="bandd_id" class="form-label">Banda</label>
                    <select name="banda_id" id="" class="form-select" aria-label="Default select example" required>
                        <option disabled selected>Escolha uma Banda</option>
                        @foreach ($bands as $band)
                            <option value="{{ $band->id }}">
                                {{ $band->nome_bd }}</option>
                        @endforeach
                    </select>
                    <br>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Registrar Album</button>
                </div>
                <br>
            </form>
            <br />
            <a class="btn btn-outline-primary" href="{{ route('home.index') }}">Voltar</a>
        </div>
    </main>
@endsection
