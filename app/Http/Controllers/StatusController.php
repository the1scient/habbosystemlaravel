<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;


class StatusController extends Controller
{
    public function getStatusById($id) {
        $status = Status::where('id', $id)->first();
        return $status;
    }

    public function getAllStatus() {
        $status = Status::all();
        return $status;
    }
}
