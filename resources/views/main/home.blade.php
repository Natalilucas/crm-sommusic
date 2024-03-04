@extends('layout.femaster')
@section('content')
    <main class="container">
        <div>
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center m-3 p-5 ">

            <div class="p-3">
                <a class="btn btn-outline-dark" href="{{ route('bandas.add-band') }}">NOVA BANDA</a>
            </div>
            <div class="p-3">
                <a class="btn btn-outline-dark" href="{{ route('albuns.add-album') }}">NOVO ALBUM</a>
            </div>
        </div>


        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Banda</th>
                    <th>Nome</th>
                    <th>Qtd Albuns</th>
                    <th>Albuns</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allbandas as $item)
                    <tr>
                        <td class="d-flex justify-content-center"><img
                                src="{{ $item->foto_bd ? asset('storage/' . $item->foto_bd) : asset('image/semFoto.jpg') }}"
                                alt="Album"
                                style="max-width: 120px; max-height: 120px; border-radius: 8px; border: #202020 solid 1px;">
                        </td>
                        <td>{{ $item->nome_bd }}</td>
                        <td>{{ $item->albuns_qtd }}</td>
                        <td>
                            <a href="{{ route('albuns.view', $item->id) }}" class="btn btn-outline-primary" >Ver Albuns</a>
                        </td>
                        <td><a href="{{route('bandas.view_banda', $item->id)}}" class="btn btn-info">Editar</a></td>
                        <td><a href="{{route('banda.delete', $item->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </main>
@endsection
