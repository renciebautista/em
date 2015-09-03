<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
	public $timestamps = false;
    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'terminal',
        'active'
    ];

}
