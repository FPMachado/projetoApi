<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
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

    public function search(SearchRequest $request)
    {
        $pesquisa = $request->pesquisa;
        $filmes = Http::get("https://api.themoviedb.org/3/search/movie?api_key={$this->apiKey}&language=pt-BR&query={$pesquisa}&page=1&include_adult=false")->json('results');
        return view('index', compact('filmes'));
    }

    public function show(Request $request)
    {
        $id = $request->id;

        $apiConfiguration = Http::get("https://api.themoviedb.org/3/configuration?api_key={$this->apiKey}")->json('images');
        $urlBase = $apiConfiguration['base_url'];

        $infoFilme = Http::get("https://api.themoviedb.org/3/movie/{$id}?api_key={$this->apiKey}&language=pt-BR")->json();   
        $path = $infoFilme["poster_path"];

        $poster ="{$urlBase}". "w300" . "$path";

        return view('show', compact('infoFilme', 'poster'));
    }

    public function getGenero(Request $request)
    {
        $filmeId = $request->id;

    }
}
