<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JustificacaoDespesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborador',
        'departamento',
        'mes',
        'ano',
        'valor_total',
        'motivo',
        'tipoDespesa',
        'data',
        'progress',
        'status',
       
    ];

    public function itens()
    {
        return $this->hasMany(ItemDespesa::class);
    }

   
}
