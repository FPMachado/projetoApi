<?php

namespace App\Http\Controllers;

use App\Jobs\JobAddMovie;
use App\Jobs\JobemailResetPassword;
use App\Mail\LinkResetPassword;
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

    public static function sendEmailAddMovie($user_id, $personal_list_id)
    {
        $user = User::findOrFail($user_id);
        $data_personal_list = PersonalList::where('id', $personal_list_id);
        // $data_personal_list = DB::table('personal_list')->where('id', $personal_list_id)->first();
        // dd($data_personal_list);
        JobAddMovie::dispatch($user, $data_personal_list)->delay(now()->addSecond('5'));

        return redirect()->intended();
    }
}
