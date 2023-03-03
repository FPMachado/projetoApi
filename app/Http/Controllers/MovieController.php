<?php

namespace App\Http\Controllers;

use App\DTO\MovieDTO;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    final public function index()
    {
        dd((new MovieDTO)->list()->getCollection()->firstWhere('title', "Transfusão"));
    }
}
