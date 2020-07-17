<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class centro extends Model
{
    public $timestamp = 'false';
    public $table='centro';
    public $primaryKey='idcentro';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'denominacao','capacidade','obs','tipo_centro_idtipo_centro','endereco_idendereco','contacto_idcontacto','utilizador_idutilizador'
    ];
}
