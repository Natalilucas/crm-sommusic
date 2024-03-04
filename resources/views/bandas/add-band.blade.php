@extends('layout.femaster')

@section('content')
    <main class="container-fluid">


        <div class="text-center">
            <br>
            <h2>Add band to music platform</h2>
        </div>

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <div class="container">
            <form method="POST" action="{{ route('bandas.createBand') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nomebanda" class="form-label">Nome da Banda</label>
                    <input type="text" value="{{old('nome_bd')}}" name="nome_bd" class="form-control" id="nomebanda" placeholder="Nome da Banda">
                </div>
                <div class="mb-3">
                    <label for="fotobanda" class="form-label">Upload foto</label>
                    <input name="foto_bd" value="{{old('foto_bd')}}" class="form-control form-control-sm" id="foto_bd" type="file">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Registrar banda</button>
                </div>
            </form>
            <br/>
            <a class="btn btn-outline-primary" href="{{ route('home.index') }}">Voltar</a>
        </div>
    </main>
@endsection
