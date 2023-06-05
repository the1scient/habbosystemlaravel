@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- bootstrap form -->
                        <form action="{{ url('usuarios/' . $usuario->id .  '/update') }}" method="post">

                            @csrf
                            <div class="form-group">
                                <label for="nome">Nickname:</label>
                                <input class="form-control mt-1" type="text" name="nickname" id="nome"  value="{{ $usuario->nickname }}">
                            </div>
                            <div class="form-group mt-2">

                                <label for="cargo">Cargo:</label>
                                <select class="form-control mt-1" name="cargo" id="cargo">
                                    @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->id }}" {{ $usuario->cargo == $cargo->id ? 'selected' : '' }}>{{ $cargo->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Enviar</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
