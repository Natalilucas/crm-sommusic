@extends('layout.femaster')

@section('content')
    <main class="container-fluid">

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <div class="container">
            <form method="post" action="{{route('banda.updateBanda')}}">
                @csrf
                <input type="hidden" name="id" value="{{$myBand->id}} id=""">
                <div class="mb-3">
                    <label for="nomebanda" class="form-label">Nome da Banda</label>
                    <input type="text" value="{{$myBand->nome_bd}}" name="nome_bd" class="form-control" id="nomebanda" placeholder="Nome da Banda">
                </div>
                <div class="mb-3">
                    <label for="fotobanda" class="form-label">Upload foto</label>
                    <input name="foto_bd" value="{{$myBand->foto_bd}}" class="form-control form-control-sm" id="foto_bd" type="file">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-info">Atualizar banda</button>
                </div>
            </form>
            <br/>
            <a class="btn btn-outline-primary" href="{{ route('home.index') }}">Voltar</a>
        </div>
    </main>
@endsection
