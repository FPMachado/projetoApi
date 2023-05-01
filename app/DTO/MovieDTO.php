<?php

namespace App\DTO;

use GuzzleHttp\Utils;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class MovieDTO
{
    private string $api_key;
    private string $base_url;
    private Collection $collection;
    private int $page;
    private int $total_pages;
    private int $total_results;

    public function __construct()
    {
        $this->base_url = config('tmdb.base_url');
        $this->api_key = config('tmdb.api_key');
    }

    public function list(int $page = 1)
    {
        $response = Http::get("$this->base_url/3/discover/movie", [
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
        $this->page = $data['page'];
        $this->collection = collect($data['results']);
        $this->total_pages = $data['total_pages'];
        $this->total_results = $data['total_results'];
    }

    public function getCollection()
    {
        return $this->collection;
    }
}
