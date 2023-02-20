<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmesController extends Controller
{
    // public function store(Request $request)
    // {
        
    // }

    public function teste(Request $request)
    {
        $id = $request->id;
        var_dump("<pre>", $id, "</pre>"); die;
    }
}
