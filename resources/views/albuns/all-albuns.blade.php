@extends('layout.femaster')
@section('content')
    <main class="container">


        <div class="">
            <form method="GET" class="form-inline w-1">
                <div class="input-group">
                    <input type="search" value="" name="search" id="" class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">PROCURAR </button>
                </div>

            </form>
        </div>

        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome do album</th>
                    <th>Data de lançamento</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albuns as $item)
                    <tr>
                        <td class="d-flex justify-content-center"><img
                                src="{{ $item->imagem_album ? asset('storage/' . $item->imagem_album) : asset('image/semFoto.jpg') }}"
                                alt="Album"
                                style="max-width: 120px; max-height: 120px; border-radius: 8px; border: #202020 solid 1px;">
                        </td>
                        <td>{{ $item->nome_album }}</td>
                        <td>{{ $item->lancamento }}</td>
                        <td><a href="{{route('albuns.update', $item->id)}}" class="btn btn-info">Editar</a></td>
                        <td><a href="{{route('albuns.delete', $item->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach


            </tbody>

        </table>

    </main>
@endsection
