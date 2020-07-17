<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gestor extends Model
{
    public $table='utilizador';
    public $primaryKey='idutilizador';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto'
    ];
}
