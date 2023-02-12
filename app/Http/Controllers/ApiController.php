<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Elenco;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    private $apiKey;
    private $Http;

    public function __construct()
    {
       $this->apiKey = config('tmdb.api_key');
       $this->Http = Http::withOptions(['verify' => false]);
    }

    public function __invoke()
    {  
        $filmes = $this->Http->get("https://api.themoviedb.org/3/discover/movie?api_key={$this->apiKey}&language=pt-BR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate")->json('results');
        return view('index', compact('filmes'));
    }

    public function search(SearchRequest $request)
    {
        $pesquisa = $request->pesquisa;
        $filmes = $this->Http->get("https://api.themoviedb.org/3/search/movie?api_key={$this->apiKey}&language=pt-BR&query={$pesquisa}&page=1&include_adult=false")->json('results');
        return view('index', compact('filmes'));
    }

    public function show(Request $request)
    {
        $id = $request->id;

        $apiConfiguration   = $this->Http->get("https://api.themoviedb.org/3/configuration?api_key={$this->apiKey}")->json('images');
        $infoFilme          = $this->Http->get("https://api.themoviedb.org/3/movie/{$id}?api_key={$this->apiKey}&language=pt-BR&append_to_response=credits,release_dates")->json();
        $infoTrailer        = $this->Http->get("https://api.themoviedb.org/3/movie/{$id}/videos?api_key={$this->apiKey}&language=pt-BR")->json('results');

        $titulo             = Filme::getTitulo($infoFilme);
        $anoLancamento      = Filme::getAnoLancamento($infoFilme);
        $tagLine            = Filme::getTagLine($infoFilme);
        $nota               = Filme::getNotaFilme($infoFilme);
        $genero             = Filme::getGenero($infoFilme['genres']);
        $poster             = Filme::montaPoster($apiConfiguration['base_url'], $infoFilme, 300);
        $sinopse            = Filme::getSinopse($infoFilme);
        $trailer            = Filme::getTrailer($id, $infoTrailer);
        $classificacao      = Filme::getClassificacao($infoFilme);
        $orcamento          = Filme::getOrcamento($infoFilme);
        $receita            = Filme::getReceita($infoFilme);
        $status             = Filme::getStatusFilme($infoFilme);

        $infoEquipe = $infoFilme['credits']['crew'];
        
        $nomeDiretor    = Elenco::getDirectorName($infoEquipe);
        $nomeEscritor   = Elenco::getWriterName($infoEquipe);
        $idDiretor      = Elenco::getIdDirector($infoEquipe);

        return view('show', compact('titulo', 'id', 'anoLancamento', 'tagLine', 'nota', 'genero', 'sinopse', 'poster', 'nomeDiretor', 'nomeEscritor', 'trailer', 'classificacao', 'orcamento', 'receita', 'status'));
    }
}
