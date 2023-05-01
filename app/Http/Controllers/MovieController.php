<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\MovieIndexRequest;
use App\Http\Requests\Movie\MovieSearchRequest;
use App\Http\Requests\Movie\MovieShowRequest;

class MovieController extends Controller
{
    final public function index(MovieIndexRequest $request)
    {
        return $request->handle()->view();
    }

    final public function search(MovieSearchRequest $request)
    {
        return $request->handle()->view();
    }

    final public function show(int $movie, MovieShowRequest $request)
    {
        return $request->merge(['movie' => $movie])->handle()->view();
    }
}
