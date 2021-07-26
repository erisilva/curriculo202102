<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'email', 'cpf', 'rg', 'nascimento', 'cep', 'logradouro', 'bairro', 'numero', 'complemento', 'cidade', 'uf', 'cel1', 'cel2', 'funcao_id', 'formacao_id', 'registro', 'arquivo1Nome', 'arquivo1Local', 'arquivo1Url', 'arquivo2Nome', 'arquivo2Local', 'arquivo2Url',
    ];

    protected $dates = ['created_at', 'nascimento'];


    public function funcao()
    {
        return $this->belongsTo(Funcao::class);
    }

    public function formacao()
    {
        return $this->belongsTo(Formacao::class);
    }    
}
