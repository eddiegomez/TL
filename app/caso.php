<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caso extends Model
{
    public $timestamp = 'false';
    public $table='caso';
    public $primaryKey='idcaso';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pessoa_perdida_idpessoa_perdida', 'utilizador_idutilizador'
    ];
}
