<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->where('id', auth()->user()->id)->first();
        return view('profile.profile', compact('user'));
    }
}
