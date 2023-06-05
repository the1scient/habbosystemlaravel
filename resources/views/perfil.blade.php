@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Imagem | ' . $usuario->nickname) }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <img id="img-usuario" class="text-center" style="display: block; margin-left: auto; margin-right: auto; center; justify-content: center; text-align-last: center;" src="" alt="Avatar de {{ $usuario->nickname }}" >

                    </div>
                </div>
            </div>

            <div class="col-md-8">

                <div class="card">


                    <div class="card-header">{{ __('Perfil | ' . $usuario->nickname) }}</div>

                    <div class="card-body">
                        <h1 class="text-center">{{ __('Informações de ' . $usuario->nickname) }}</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Data de Alistamento</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $usuario->nickname }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ url('usuarios/' . $usuario->id) . '/editar' }}" class="btn btn-warning">Editar</a>
                    </div>

                </div>

            </div>



<script>

// on ready pure js
document.addEventListener("DOMContentLoaded", function(event) {
    // get img-usuario element
    var imgUsuario = document.getElementById('img-usuario');
    // set img-usuario src
    imgUsuario.src = "https://www.habbo.com.br/habbo-imaging/avatarimage?&user={{ $usuario->nickname }}&action=wlk&direction=2&head_direction=2&img_format=png&gesture=std&size=l";

    setTimeout(function(){
        imgUsuario.src = "https://www.habbo.com.br/habbo-imaging/avatarimage?&user={{ $usuario->nickname }}&action=std&direction=3&head_direction=3&img_format=png&gesture=std&size=l";
    }, 2000);

    setTimeout(function(){
        imgUsuario.src = "https://www.habbo.com.br/habbo-imaging/avatarimage?&user={{ $usuario->nickname }}&action=wav&direction=3&head_direction=3&img_format=png&gesture=sml&size=l";
    }, 2500);

    setTimeout(function(){
        imgUsuario.src = "https://www.habbo.com.br/habbo-imaging/avatarimage?&user={{ $usuario->nickname }}&action=std&direction=3&head_direction=3&img_format=png&gesture=sml&size=l";
    }, 5000);

});

</script>



        </div>
    </div>
@endsection