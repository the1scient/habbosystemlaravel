<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

class CargosController extends Controller
{
    public function getCargoById($id) {
        $cargo = Cargo::where('id', $id)->first();
        return $cargo;
    }

    public function getAllCargos() {
        $cargos = Cargo::all();
        return $cargos;
    }
}
