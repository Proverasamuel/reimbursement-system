<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'departamento',
        'sigla',
        'direccao',
        'coordenador',
        'chefe',
        'avatar'
    ];

    public function coordenador()
    {
        return $this->belongsTo(User::class, 'coordenador');
    }

    public function chefe()
    {
        return $this->belongsTo(User::class, 'chefe');
    }
}
