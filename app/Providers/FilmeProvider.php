<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FilmeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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

    public static function getGenero(array $infoFilme)
    {
        foreach ($infoFilme as $genero) {
            $generos[] = $genero['name'];
        }
        return implode(", ", $generos);
    }

    public static function getTitulo(array $infoFilme)
    {
        return $infoFilme['title'];
    }

    public static function getTagLine(array $infoFilme)
    {
        return $infoFilme['tagline'];
    }

    public static function getAnoLancamento(array $infoFilme)
    {
        return substr(date('d/m/Y', strtotime($infoFilme['release_date'])), 6);
    }

    public static function montaPoster(string $urlBase, array $infoFilme, int $tamanho)
    {           
        if(empty($infoFilme['poster_path'])){
            return url('storage/sem-foto.png');
        }else{
            $path = $infoFilme['poster_path'];
        }

        return "{$urlBase}" . "w{$tamanho}" . "{$path}";
    }

    public static function getNotaFilme(array $infoFilme)
    {
        return number_format($infoFilme['vote_average'], 2);
    }

    public static function getSinopse(array $infoFilme)
    {
        return $infoFilme['overview'];
    }

    public static function getTrailer($id, array $infoTrailer)
    {
        $url = "https://www.youtube.com/watch?v=";

        if(empty($infoTrailer)){
            $erro = "Este filme não possui trailer";
            return false;
        }

        foreach ($infoTrailer as $key => $trailer) {
            $chave = $trailer['key'];
        }
        return $url.$chave;
    }

    public static function getClassificacao(array $infoFilme)
    {
        foreach ($infoFilme['release_dates']['results'] as $key => $resultado) {
            if(array_search("BR", $resultado)){      
                foreach ($resultado['release_dates'] as $key => $classificacao) {
                    $idade = $classificacao["certification"];
                }  
            }   
        }

        return (!empty($idade)) ? $idade : "SC";
    }

    public static function getMovieBypopularity(array $filmes)
    {
        $pop ="";
        foreach ($filmes as $key => $filme) {    
            if($pop < $filme['popularity']){
                $pop= $filme['popularity'];
                $filmePopular = $filme;
            }   
        }
        return $filmePopular;
    }

    public static function getOrcamento(array $infoFilme)
    {   
        return number_format($infoFilme['budget'], 2, ",", ".");
    }

    public static function getReceita(array $infoFilme)
    {
        return number_format($infoFilme['revenue'], 2, ",", ".");
    }

    public static function getStatusFilme($infoFilme)
    {
        return ($infoFilme['status'] == "Planned") ? "Planejado" : "Lançado";
    }

    public static function getDataLancamento($infoFilme)
    {
        
        return $infoFilme['release_date'];
    }
}