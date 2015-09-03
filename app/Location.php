<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;
    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'location'
    ];
}
