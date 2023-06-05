<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\CargosController;

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

    public function edit($id) {
        $usuario = Usuario::findOrFail($id);
        return view('edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id) {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        Session::flash('message', 'Usuário atualizado com sucesso!');
        return Redirect::to('/usuarios');
    }

    public function delete($id) {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        Session::flash('message', 'Usuário excluído com sucesso!');
        return Redirect::to('/usuarios');
    }

    public function perfil($username) {
        $usuario = Usuario::where('nickname', $username)->first();

        $cargoController = new CargosController();
        $cargo = $cargoController->getCargoById($usuario->id);

        if(!$usuario) {
            return Redirect::to('/usuarios');
        }

        return view('perfil', ['usuario' => $usuario, 'cargo' => $cargo]);
    }


    public function promovidoPor($id) {
        $usuario = Usuario::where('id', $id)->first();

        if(!$usuario) {
            return '-';
        }

        $promovidoPor = Usuario::where('id', $usuario->promovido_por)->first();

        if(!$promovidoPor) {
            return '-';
        }

        return $promovidoPor->nickname;
    }

    public function userStatus($statusId){
        $status = [
            1 => 'Ativo',
            2 => 'Inativo',
            3 => 'Banido'
        ];
        return $status[$statusId];
    }


}
