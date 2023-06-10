<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PersonalList extends Model
{
    use HasFactory;

    protected $table = "personal_list";
    protected $fillable = ['personal_list_id', 'user_id', 'note', 'movie_id','assisted_in'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
