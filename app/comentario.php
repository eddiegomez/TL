<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    public $timestamp = 'false';
    public $table='comentario';
    public $primaryKey='idcomentario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comentario', 'caso_idcaso', 'utilizador_idutilizador'
    ];
}
