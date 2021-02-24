@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Nome</td>
          <td>Email</td>
          <td>CPF</td>
          <td>Telefone</td>
          <td>Endereço</td>
          <td>Data de nascimento</td>
          <td>Senha</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($donors as $donors)
        <tr>
            <td>{{$donors->id}}</td>
            <td>{{$donors->name}}</td>
            <td>{{$donors->email}}</td>
            <td>{{$donors->cpf}}</td>
            <td>{{$donors->phone}}</td>
            <td>{{$donors->address}}</td>
            <td>{{$donors->dt_birth}}</td>
            <td>{{$donors->password}}</td>
            <td class="text-center">
                <a href="{{ route('donors.edit', $donors->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('donors.destroy', $donors->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection