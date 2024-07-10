<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;

    protected $fillable = [
        'justificacao_despesa_id',
        'caminho',
    ];

    public function justificacaoDespesa()
    {
        return $this->belongsTo(JustificacaoDespesa::class);
    }
}
