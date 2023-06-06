<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = ['nickname', 'cargo', 'promovido_por'];

    public function promovidoPor()
    {
        return $this->belongsTo(Usuario::class, 'promovido_por');
    }

}
