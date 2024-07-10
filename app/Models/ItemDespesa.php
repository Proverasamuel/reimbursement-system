<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDespesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'justificacao_despesa_id',
        'descricao',
        'valor',
        'caminhoFicheiro',
        'caminhoImagem',
    ];

    public function justificacaoDespesa()
    {
        return $this->belongsTo(JustificacaoDespesa::class);
    }
}
