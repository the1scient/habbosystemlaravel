@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a  href="{{ url('usuarios/novo') }}">Novo usuário</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <!-- show session message -->
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        <h1 class="text-center">{{ __('Lista de usuários') }}</h1>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Imagem</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <!-- habbo avatar on image -->
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <th scope="row">{{ $usuario->id }}</th>
                                        <td><img src="https://www.habbo.com.br/habbo-imaging/avatarimage?user={{ $usuario->nickname }}&action=std&gesture=std&direction=2&head_direction=2&size=m&img_format=png" alt="avatar"></td>
                                        <td><a href="{{ url('/perfil/' . $usuario->nickname) }}">{{ $usuario->nickname }}</a></td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            <a href="{{ url('usuarios/' . $usuario->id) . '/editar' }}" class="btn btn-warning">Editar</a>
                                            <a href="{{ url('usuarios/' . $usuario->id) . '/delete' }}" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                @endforeach




                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
