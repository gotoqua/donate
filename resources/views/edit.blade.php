@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Edit & Update
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('donors.update', $donors->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" value="{{ $donors->name }}"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $donors->email }}"/>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="number" class="form-control" name="cpf" value="{{ $donors->cpf }}"/>
                </div>
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="tel" class="form-control" name="phone" value="{{ $donors->phone }}"/>
            </div>
            <div class="form-group">
                <label for="address">Endereço</label>
                <input type="text" class="form-control" name="address" value="{{ $donors->address }}"/>
            </div>
            <div class="form-group">
                <label for="dt_birth">Data de nascimento</label>
                <input type="text" class="form-control" name="dt_birth" value="{{ $donors->dt_birth }}"/>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="text" class="form-control" name="password" value="{{ $donors->password }}"/>
            </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection