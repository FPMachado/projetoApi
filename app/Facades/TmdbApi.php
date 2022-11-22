<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TmdbApi extends Facade
{    
    protected static function getFacadeAccessor()
    {
        return "test";
    } 
}