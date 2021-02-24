<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donate</title>
</head>
<body>

    @extends('layout')

    <nav>

    </nav>

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
                Cadastre-se para doar!
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
                <form method="post" action="{{ route('donors.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email"/>
                    </div>                    
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf"/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input type="tel" class="form-control" name="phone"/>
                    </div>
                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input type="text" class="form-control" name="address"/>
                    </div>
                    <div class="form-group">
                        <label for="dt_birth">Data de nascimento</label>
                        <input type="text" class="form-control" name="dt_birth"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="text" class="form-control" name="password"/>
                    </div>
                    <button type="submit" class="btn btn-block btn-success">Create User</button>
                </form>
            </div>
        </div>

    @endsection

</body>
</html>