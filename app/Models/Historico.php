<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table = 'historico';
    use HasFactory;
    protected $fillable = ['usuario_id', 'promovido_por', 'old_cargo', 'new_cargo', 'motivo'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function promovidoPor()
    {
        return $this->belongsTo(Usuario::class, 'promovido_por');
    }

    public function oldCargo()
    {
        return $this->belongsTo(Cargo::class, 'old_cargo');
    }

    public function newCargo()
    {
        return $this->belongsTo(Cargo::class, 'new_cargo');
    }
}
