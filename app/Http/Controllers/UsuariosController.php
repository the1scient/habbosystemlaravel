<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CargosController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\StatusController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        // Order the usuarios by cargo id
        $usuarios = Usuario::all()->sortBy('cargo');

        $cargoController = new CargosController();
        $cargos = $cargoController->getAllCargos();

        $status = new StatusController();
        $status = $status->getAllStatus();

        return view('list', ['usuarios' => $usuarios, 'cargos' => $cargos, 'status' => $status]);
    }


    public function create() {
       // return view novo + cargos
        $cargoController = new CargosController();
        $cargos = $cargoController->getAllCargos();
        return view('novo', ['cargos' => $cargos]);
    }

    public function add(Request $request) {
        // Obter o ID do usuário atualmente autenticado
        $promovidoPor = auth()->user()->id;

        // Criar um novo usuário e preencher os dados
        $usuario = new Usuario();
        $usuario->nickname = $request->nickname;
        // Definir o campo promovido_por como o ID do usuário atual
        $usuario->promovido_por = $promovidoPor;
        // Preencher outros campos do usuário, se houver
        // cargo
        $usuario->cargo = $request->cargo;

        // Salvar o usuário no banco de dados
        $usuario->save();

        return Redirect::to('/usuarios');
    }



    public function edit($id) {
        $usuario = Usuario::findOrFail($id);

        $cargoController = new CargosController();
        $cargos = $cargoController->getAllCargos();

        $status = new StatusController();
        $status = $status->getAllStatus();

        return view('edit', ['usuario' => $usuario, 'cargos' => $cargos, 'status' => $status]);
    }

    public function update(Request $request, $id) {
        $usuario = Usuario::findOrFail($id);
        // update and update promovido_por
        $oldCargo = $usuario->cargo;


        $usuario->nickname = $request->nickname;
        $usuario->cargo = $request->cargo;
        $usuario->promovido_por = auth()->user()->id;
        $usuario->status = $request->status;
        $usuario->verificado = $request->has('verificado') ? 1 : 0;
        $usuario->updated_at = date('Y-m-d H:i:s');
        $usuario->save();

        // add to historico
        $historicoController = new HistoricoController();
        if($oldCargo != $request->cargo) {
        $historicoController->addHistorico($usuario->id, $usuario->promovido_por, $oldCargo, $request->cargo, $request->motivo);
        }



        Session::flash('message', 'Usuário atualizado com sucesso!');
        return Redirect::to('/perfil/' . $usuario->nickname);
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
        $cargo = $cargoController->getCargoById($usuario->cargo);

        if(!$usuario) {
            return redirect('/usuarios');
        }

        $historicoController = new HistoricoController();
        $historico = $historicoController->getHistoricoByUsuarioId($usuario->id);

        return view('perfil', ['usuario' => $usuario, 'cargo' => $cargo, 'historico' => $historico]);
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



}
