<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    //protected $except = array('api/timelog');
    protected $except = [
        'api/timelog',
        'api/iot'
    ];
    // protected $except = [
    //     //
    // ];
}
