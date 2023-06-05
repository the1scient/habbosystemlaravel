<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index() {

        $usuarios = Usuario::all();

        return view('list', ['usuarios' => $usuarios]);
    }

    public function create() {
        return view('novo');
    }

    public function add(Request $request) {
        $usuario = new Usuario();
        $usuario = $usuario->create($request->all());
        return Redirect::to('/usuarios');
    }
}
