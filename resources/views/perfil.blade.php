@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">{{ __('Imagem | ' . $usuario->nickname) }}</div>

                    <div class="card-body">
                        <h5 class="text-center">
                            {{ $usuario->nickname }}
                                @if($usuario->verificado != 0)
                            <i class="fas fa-circle-check" style="color: #1978f4;" data-bs-toggle="tooltip" data-bs-placement="right" title="Verificado"></i>
                                @endif
                        </h5>
                        <img id="img-usuario" class="text-center" style="display: block; margin-left: auto; margin-right: auto; justify-content: center; text-align-last: center;" src="" alt="Avatar de {{ $usuario->nickname }}">
                    </div>
                </div>
            </div>


            <div class="col-md-8">

                <div class="card shadow-lg">


                    <div class="card-header">{{ __('Perfil | ' . $usuario->nickname) }}</div>

                    <div class="card-body">
                        <h1 class="text-center">{{ (' Informações do usuário: ') }}</h1>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><strong>Nickname:</strong></td>
                                <td>{{ $usuario->nickname }}</td>
                                <td><strong>Data de Alistamento:</strong></td>
                                <td>{{ date('d/m/Y H:i', strtotime($usuario->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Cargo:</strong></td>
                                <td>{{ $cargo->nome ?? '-' }}</td>
                                <td><strong>Última Promoção:</strong></td>
                                <td>{{ date('d/m/Y H:i', strtotime($usuario->updated_at)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>{{ app('App\Http\Controllers\UsuariosController')->userStatus($usuario->status) }}</td>
                                <td><strong>Promovido por:</strong></td>
                                <td>{{ $usuario->promovidoPor->nickname }}</td>


                            </tr>
                            </tbody>
                        </table>

                        <a href="{{ url('usuarios/' . $usuario->id) . '/editar' }}" class="btn btn-warning">Editar</a>
                    </div>

                </div>

            </div>

            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-header">Emblemas e Grupos | {{ $usuario->nickname }}</div>

                    <div class="card-body">
                        <img data-bs-toggle="tooltip" data-bs-placement="right" title="Emblema" src="https://1.bp.blogspot.com/-7uLa-QXl3Rc/XDQnJo7Z41I/AAAAAAABKTQ/J_m6TrIqZAYG7Dx9MXiZu5WSd_ZjZh3ewCKgBGAs/s1600/NL593.gif">
                    </div>


                </div>
            </div>

            <div class="col-md-8 mt-3">

                <div class="card shadow">

                    <div class="card-header">{{ __('Histórico de Promoções | ' . $usuario->nickname) }}</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Promovido por</th>
                                    <th scope="col">Cargo</th>
                                </tr>
                            </thead>
                            <tbody>

                                    <tr>
                                        <td>{{ date('d/m/Y H:i') }}</td>
                                        <td>{{ 'test' }}</td>
                                        <td>{{ 'test3' }}</td>
                                    </tr>

                            </tbody>
                        </table>

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
