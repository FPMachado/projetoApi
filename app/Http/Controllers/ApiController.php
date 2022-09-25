<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Elenco;
use App\Models\Filme;
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

        $apiConfiguration   = Http::get("https://api.themoviedb.org/3/configuration?api_key={$this->apiKey}")->json('images');
        $infoFilme          = Http::get("https://api.themoviedb.org/3/movie/{$id}?api_key={$this->apiKey}&language=pt-BR&append_to_response=credits,release_dates")->json();
        $infoTrailer        = Http::get("https://api.themoviedb.org/3/movie/{$id}/videos?api_key={$this->apiKey}&language=pt-BR")->json('results');


        $titulo         = Filme::getTitulo($infoFilme);
        $anoLancamento  = Filme::getAnoLancamento($infoFilme);
        $tagLine        = Filme::getTagLine($infoFilme);
        $nota           = Filme::getNotaFilme($infoFilme);
        $genero         = Filme::getGenero($infoFilme['genres']);
        $poster         = Filme::montaPoster($apiConfiguration['base_url'], $infoFilme, 300);
        $sinopse        = Filme::getSinopse($infoFilme);
        $trailer        = Filme::getTrailer($id, $infoTrailer);
        $classificacao  = Filme::getClassificacao($infoFilme);

        $infoEquipe = $infoFilme['credits']['crew'];
        
        $nomeDiretor    = Elenco::getDirectorName($infoEquipe);
        $nomeEscritor   = Elenco::getWriterName($infoEquipe);
        //$idDiretor      = Elenco::getIdDirector($infoEquipe);
        //$filmesDiretor  = Http::get("https://api.themoviedb.org/3/person/{$idDiretor}/combined_credits?api_key={$this->apiKey}&language=pt-BR")->json('crew');
        //$filmePopular = Filme::getMovieByPopularity($filmesDiretor);
        //$posterPopular = Filme::montaPoster($apiConfiguration['base_url'], $filmePopular, 92);

      
        
        
        
        return view('show', compact(/*'posterPopular',*/'titulo', 'anoLancamento', 'tagLine', 'nota', 'genero', 'sinopse', 'poster', 'nomeDiretor', 'nomeEscritor', 'trailer', 'classificacao'));
    }
}
