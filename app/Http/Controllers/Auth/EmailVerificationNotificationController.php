<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect("/profile/".auth()->user()->id)->with("warning", "Seu email já está verificado.");
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Enviamos um email para você. Verifique sua caixa de entrada');
    }
}
