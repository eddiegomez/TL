<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pessoa_perdida extends Model
{
    public $timestamp = 'true';
    public $table='pessoa_perdida';
    public $primaryKey='idpessoa_perdida';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'apelido', 'alcunha', 'sexo', 'data_nascimento','nacionalidade','naturalidade', 'obs',  'foto_idfoto','tipo'
    ];
}
