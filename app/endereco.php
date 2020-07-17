<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    public $timestamp = 'false';
    public $table='endereco';
    public $primaryKey='idendereco';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pais','provincia','distrito','bairro','avenida','numero'
    ];
}
