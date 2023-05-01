<?php

namespace App\Gateways;

use App\Gateways\TMDBGateway;

class TMDB extends TMDBGateway
{
    protected string $base_url;
    protected string $api_key;
    
    public function __construct()
    {
        $this->base_url = config('tmdb.base_url');
        $this->api_key = config('tmdb.api_key');
    }
}