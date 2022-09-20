<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    private $apiKey = "2df4cbb5aa5fea9c56b0371aeddacdbc";
    public function __invoke()
    {
        $filmes = Http::get("https://api.themoviedb.org/3/discover/movie?api_key={$this->apiKey}&language=pt-BR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate")->json('results');
        return view('index', compact('filmes'));
    }

    public function search(Request $request)
    {
        $pesquisa = $request->pesquisa;
        $filmes = Http::get("https://api.themoviedb.org/3/search/movie?api_key={$this->apiKey}&language=pt-BR&query={$pesquisa}&page=1&include_adult=false")->json('results');
        return view('index', compact('filmes'));  
    }

   public function show(Request $request)
   {
        $id = $request->id;
        $url = Http::get("https://api.themoviedb.org/3/movie/{$id}?api_key={$this->apiKey}&language=pt-BR")->json();
        var_dump("<pre>", $url, "</pre>"); die;
   }
}
