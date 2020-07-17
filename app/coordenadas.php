<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coordenadas extends Model
{
    public $timestamp = 'false';
    public $table='coordenadas';
    public $primaryKey='idcoordenadas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'denominacao','latitude','longitude'
    ];
}

