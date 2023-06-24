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

    public function update(Request $request)
    {
        $user = User::where("id", $request->id)->first();

        $user->update([
            "name" => $request->name,
            "last_name" => $request->last_name,
            "recive_email" => $request->recive_email,
        ]);

        return redirect()->back()->with("message", "Dados atualizados com sucesso!");
    }
}
