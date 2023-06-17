<?php

namespace App\Http\Controllers;

use App\Jobs\JobAddMovie;
use App\Jobs\JobemailResetPassword;
use App\Mail\LinkResetPassword;
use App\Models\Movies;
use App\Models\PersonalList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEmailsController extends Controller
{
    public function sendLinkResetPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        
        $user = User::where('email', $request->email)->first();

        JobEmailResetPassword::dispatch($user)->delay(now()->addSecond('5'));

        return redirect()->back()->with("message", "Enviamos um email para você. Verifique sua caixa de entrada!");
    }

    public static function sendEmailAddMovie($user_id, $movie_id)
    {
        $user = User::findOrFail($user_id);
        $updated_movie_data = PersonalList::where('movie_id', $movie_id)->where('user_id', $user_id)->first();
        $movie =  Movies::where('id', $updated_movie_data->movie_id)->first();
        
        JobAddMovie::dispatch($user, $updated_movie_data, $movie)->delay(now()->addSecond('5'));

        return redirect()->intended();
    }
}
