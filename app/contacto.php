<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    public $timestamp = 'false';
    public $table='contacto';
    public $primaryKey='idcontacto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'celular','email'
    ];
}
