<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmesController extends Controller
{
    public function store(Request $request)
    {
        $id = $request->input("movie_id");
        print_r($id);
        exit;
    }
}
