<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Elenco;
use App\Providers\FilmeProvider;
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
        // $filmes = $this->Http->get("https://api.themoviedb.org/3/discover/movie?api_key={$this->apiKey}&language=pt-BR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate")->json('results');
        // return view('index', compact('filmes'));
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

        $titulo             = FilmeProvider::getTitulo($infoFilme);
        $anoLancamento      = FilmeProvider::getAnoLancamento($infoFilme);
        $tagLine            = FilmeProvider::getTagLine($infoFilme);
        $nota               = FilmeProvider::getNotaFilme($infoFilme);
        $genero             = FilmeProvider::getGenero($infoFilme['genres']);
        $poster             = FilmeProvider::montaPoster($apiConfiguration['base_url'], $infoFilme, 300);
        $sinopse            = FilmeProvider::getSinopse($infoFilme);
        $trailer            = FilmeProvider::getTrailer($id, $infoTrailer);
        $classificacao      = FilmeProvider::getClassificacao($infoFilme);
        $orcamento          = FilmeProvider::getOrcamento($infoFilme);
        $receita            = FilmeProvider::getReceita($infoFilme);
        $status             = FilmeProvider::getStatusFilme($infoFilme);
        $dataLancamento     = FilmeProvider::getDataLancamento($infoFilme);
        $miniPosterSrc      = FilmeProvider::montaPoster($apiConfiguration['base_url'], $infoFilme, 92);

        $infoEquipe = $infoFilme['credits']['crew'];
        
        $nomeDiretor    = Elenco::getDirectorName($infoEquipe);
        $nomeEscritor   = Elenco::getWriterName($infoEquipe);
        $idDiretor      = Elenco::getIdDirector($infoEquipe);

        return view('show', compact('titulo', 'id', 'anoLancamento', 'tagLine', 'nota', 'genero', 'sinopse', 'poster', 'nomeDiretor', 'nomeEscritor', 'trailer', 'classificacao', 'orcamento', 'receita', 'status', 'dataLancamento', 'miniPosterSrc'));
    }
}
