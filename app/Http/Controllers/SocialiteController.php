<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    private $socialData;

    public function redirecToProvider(string $driver)
    {
        session()->put('_social_driver', $driver);
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback()
    {
        $this->socialData = Socialite::driver(session()->get('_social_driver'))->user();

        return view('auth.register', ['user' => $this->getUser()]);
    }
    
    private function getUser()
    {
        $user_name = $this->getName($this->socialData->getName());
        return [
            'userId'    => $this->socialData->getId(),
            'name'      => $user_name[0],
            'last_name' => $user_name[1] ?? null,
            'email'     => $this->socialData->getEmail(),
            'avatar'    => $this->socialData->getAvatar(),
        ];
    }

    private function getName($user_name)
    {
        return explode(" ", $user_name);
    }
}
