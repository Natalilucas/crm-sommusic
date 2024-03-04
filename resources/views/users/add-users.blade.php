
@extends('layout.femaster')
@section('content')

<div class="container">
    <br>
    <h2>Adicionar Utilizadores</h2>
    <br>

<div class="container">
    <form method="POST" action="{{route('users.create')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="texto" name="name" value="{{old('name')}}" class="form-control" id="exampleFormControlInput1" placeholder="Nome" required>
          </div>
          @error('name')
          <div class="alert alert-danger">
              Por favor coloque um nome válido
          </div>

          @enderror
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleFormControlInput1" placeholder="email@exemplo.com" required>
            @error('email')
            <div class="invalid-feedback">
                Por favor coloque um email válido

            </div>

            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name="password" value="{{old('password')}}" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
        <br>
        <a class="btn btn-success" href="{{ route('home.index') }}">Voltar</a>
        <br>
        <br>

    </div>

</div>
@endsection

