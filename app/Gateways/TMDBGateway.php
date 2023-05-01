<?php

namespace App\Gateways;

use App\Http\Requests\Movie\MovieSearchRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Utils;

abstract class TMDBGateway
{
    protected $page;
    protected $collection;
    protected $total_pages;
    protected $total_results;

    public function list(int $page = 1)
    {
        $response = Http::get("{$this->base_url}/3/discover/movie", [
            'page'                          => $page,
            'api_key'                       => $this->api_key,
            'language'                      => 'pt-BR',
            'sort_by'                       => 'popularity.desc',
            'include_adult'                 => false,
            'include_video'                 => false,
            'with_watch_monetization_types' => 'flatrate'
        ]);

        $this->mapper(Utils::jsonDecode($response->body(), true));

        return $this;
    }

    private function mapper(array $data)
    {
        $this->page             = $data['page'];
        $this->collection       = collect($data['results']);
        $this->total_pages      = $data['total_pages'];
        $this->total_results    = $data['total_results'];
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function search($search)
    {
        $response = Http::get("{$this->base_url}/3/search/movie", [
            'page'                          => $this->page,
            'api_key'                       => $this->api_key,
            'language'                      => 'pt-BR',
            'query'                         => $search,
            'sort_by'                       => 'popularity.desc',
            'include_adult'                 => false,
            'include_video'                 => false,
            'with_watch_monetization_types' => 'flatrate'
        ]);   
        $this->mapper(Utils::jsonDecode($response->body(), true));

        return $this;
    }

    public function show($movie_id)
    {
        $response = Http::get("{$this->base_url}/3/movie/$movie_id", [
            'api_key'                       => $this->api_key, 
            'page'                          => $this->page,
            'language'                      => 'pt-BR', 
            'append_to_response'            => 'credits,release_dates,videos',

        ]);
        $this->collection = collect(Utils::jsonDecode($response->body(), true));
        return $this;
    }
} 