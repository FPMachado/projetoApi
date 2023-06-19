<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\MovieIndexRequest;
use App\Http\Requests\Movie\MovieSearchRequest;
use App\Http\Requests\Movie\MovieShowRequest;
use App\Models\Movies;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    final public function index(MovieIndexRequest $request)
    {
        return $request->handle()->view();
    }

    public static function store(Request $request)
    {

        if(!empty(Movies::where('id', $request->movie_id)->first())){
            return false;
        }

        Movies::create([
            'id'            => $request->movie_id,
            'note'          => $request->note,
            'name'          => $request->movie_name,
            'img_src'       => $request->img_poster,
            'synopsis'      => $request->synopsis,
            'release_date'  => $request->release_date,
        ]);
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
