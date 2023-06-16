<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $table = "movies";
    protected $fillable = ['id', 'note', 'name', 'img_src', 'synopsis' ,'release_date'];

    
}
