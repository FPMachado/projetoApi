<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all(['id', 'name', 'last_name', 'email']);

        return view('admin.index', compact('users'));
    }
}
