<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
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
}
