<?php

namespace App;

use Illuminate\Support\Facades\Http;

class TmdbApi 
{
    public static function test() 
    {
        return  Http::withOptions([
            'verify' => false,
            'base_uri' => 'https://www.themoviedb.org/movie',
        ])->withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZGY0Y2JiNWFhNWZlYTljNTZiMDM3MWFlZGRhY2RiYyIsInN1YiI6IjYzMjdjYWU2YjE4ZjMyMDA4MDEzMThhNSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.RT-E2VN8-7WcyPPJcmhgi9VoUe6WSnpxR8ZS6yLiJZM',
        ]);
    }
}