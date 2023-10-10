<?php

namespace App\Services;

use App\Events\DefineLoginEvent;
use App\Models\User;
use App\Services\Interfaces\SocialInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements SocialInterface
{

    public function findOrCreateUser(SocialUser $socialUser): User
    {
        $user = User::query()
            ->where('email', '=', $socialUser->getEmail())->first();
        if(!$user) {
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'avatar' => $socialUser->getAvatar(),
                'password' => Hash::make('qwerty')
            ]);
        }
        $user->avatar = $socialUser->getAvatar();
        $user->save();
        return $user;
    }
}
