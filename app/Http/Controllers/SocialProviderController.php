<?php

namespace App\Http\Controllers;

use App\Events\DefineLoginEvent;
use App\Models\User;
use App\Services\Interfaces\SocialInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialProviderController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback(SocialInterface $social)
    {
        try {
            $socialUser = Socialite::driver('vkontakte')->user();
        } catch (\Exception $e) {
            return redirect()
                ->route('login');
        }
        $user = $social->findOrCreateUser($socialUser);
        Auth::login($user, true);
        event(new DefineLoginEvent($user));
        return redirect()
            ->route('home');
    }
    public function redirectGit()
    {
        return Socialite::driver('github')->redirect();
    }
    public function callbackGit(SocialInterface $social)
    {
        try {
            $socialUser = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect()
                ->route('login');
        }
        $user = $social->findOrCreateUser($socialUser);
        Auth::login($user, true);
        event(new DefineLoginEvent($user));
        return redirect()
            ->route('home');
    }
}
