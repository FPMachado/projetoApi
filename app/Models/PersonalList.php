<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PersonalList extends Model
{
    use HasFactory;

    protected $table = "personal_list";
    protected $fillable = ['movie_id', 'user_id', 'note', 'name', 'img_src' ,'release_date', 'synopsis', 'assisted_in'];
}
