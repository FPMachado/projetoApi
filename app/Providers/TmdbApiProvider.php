<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class TmdbApiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind("TmdbApi", function(){
            Http::withOptions([
                'verify' => false,
                'base_uri' => 'https://www.themoviedb.org/movie',
            ])->withHeaders([
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZGY0Y2JiNWFhNWZlYTljNTZiMDM3MWFlZGRhY2RiYyIsInN1YiI6IjYzMjdjYWU2YjE4ZjMyMDA4MDEzMThhNSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.RT-E2VN8-7WcyPPJcmhgi9VoUe6WSnpxR8ZS6yLiJZM',
            ]);
        });*/
        $this->app->bind('test',function() {
            return new \App\TmdbApi;
         });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
