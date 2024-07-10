<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'genero',
        'funcao',
        'estado',
        'avatar'
    ];

    public function departamentosCoordenados()
    {
        return $this->hasMany(Departamento::class, 'coordenador');
    }

    public function departamentosChefiados()
    {
        return $this->hasMany(Departamento::class, 'chefe');
    }
}

