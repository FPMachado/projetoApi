<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmesController extends Controller
{
    public function store(Request $request)
    {
        $id = $request->input("movie_id");
        $title = $request->movie;
        var_dump("<pre>", $id, $title, "</pre>"); die;
        exit;
    }

    public function teste(Request $request)
    {
        $id = $request->id;
        var_dump("<pre>", $id, "</pre>"); die;
    }
}
