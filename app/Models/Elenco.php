<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elenco extends Model
{
    use HasFactory;

    public static function getDirectorName(array $infoEquipe)
    {
        if(empty($infoEquipe)){
            return "";
        }
        foreach ($infoEquipe as $key => $value) {
            if($value['job'] == "Director"){
                $nomeDiretor = $value['name'];
            }
        }

        return $nomeDiretor;
    }

    public static function getWriterName(array $infoEquipe)
    {
        foreach ($infoEquipe as $key => $value) {
            if($value['job'] == 'Writer'){
                $nomeEscritor = $value['name'];
            }
        }

       return (!empty($nomeEscritor)) ? $nomeEscritor : "" ;
    }
}
