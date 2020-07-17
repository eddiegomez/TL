<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class utilizador extends Model
{
    public $timestamp = 'false';
    public $table='utilizador';
    public $primaryKey='idutilizador';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'data_nascimento', 'ocupacao', 'nacionalidade', 'naturalidade', 'tipo_utilizador_idtipo_utilizador', 'users_id', 'contacto_idcontacto', 'foto_idfoto', 'endereco_idendereco'
    ];
}
