<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    public $timestamp = 'false';
    public $table='foto';
    public $primaryKey='idfoto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto'
    ];
}
