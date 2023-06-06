<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Historico;

class HistoricoController extends Controller
{
    public function getHistoricoByUsuarioId($usuarioId) {
        $historico = Historico::where('usuario_id', $usuarioId)->get()->sortByDesc('created_at');
        return $historico;
    }

    public function addHistorico($usuarioId, $promovidoPor, $oldCargo, $newCargo, $motivo) {
        $historico = new Historico();
        $historico->usuario_id = $usuarioId;
        $historico->promovido_por = $promovidoPor;
        $historico->old_cargo = $oldCargo;
        $historico->new_cargo = $newCargo;
        $historico->motivo = 'teste';
        $historico->save();
    }

}
